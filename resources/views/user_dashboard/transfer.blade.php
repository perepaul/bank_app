@extends('user_dashboard.master')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-display1 icon-gradient bg-premium-dark text-danger">
                </i>
            </div>
            <div>Make a Transfer
            </div>
        </div>
    </div>

</div>
<div class="main-card mb-3  card">
    <div class="card-body">
        <h5 class="card-title">Make Transfer</h5>
        <form class="needs-validation" novalidate action="" method="POST" id="transfer-form">
            @csrf
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationCustom01">Accont</label>
                    <input type="text" class="form-control" id="validationCustom01"
                        placeholder="First name"
                        value="{{auth_user_full_name(auth()->user())." - ".auth()->user()->balance}}"
                        disabled readonly required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="reciepient_name">Recipient Name</label>
                    <input type="text" class="form-control" id="reciepient_name"
                        placeholder="Recipient full name" value="" required>
                    <div class="invalid-feedback">
                        recipient's name is required
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="account_number">Account number</label>
                    <input type="text" class="form-control" id="account_number"
                        name="account_number" placeholder="Recipent's account number" required>
                    <div class="invalid-feedback">
                        Please provide recipient account number.
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="bank_name">Bank name</label>
                    <input type="text" class="form-control" id="bank_name" name="bank_name"
                        placeholder="Recipient Bank" value="" required>
                    <div class="invalid-feedback">
                        recipient's bank is required
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="routing_number">Routing number</label>
                    <input type="text" class="form-control" id="routing_number"
                        name="routing_number" placeholder="Recipient Routing Number" value=""
                        required>
                    <div class="invalid-feedback">
                        Please enter a valid Routing number.
                    </div>
                </div>

            </div>
            <div class="form-row">

                <div class="col-md-6 mb-3">
                    <label for="ammount">Amount</label>
                    <input type="text" class="form-control" max="{{auth()->user()->balance}}"
                        id="amount" name="amount" placeholder="Amount" required>
                    <div class="invalid-feedback">
                        Enter Account number
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="iban">IBAN</label>
                    <input type="text" class="form-control" id="iban" placeholder="Recipient's IBAN"
                        required name="iban">
                    <div class="invalid-feedback">
                        Please enter recipient IBAN.
                    </div>
                </div>
            </div>
            <div class="form-row">

                <div class="col-md-6 mb-3">
                    <label for="account_type">Account type</label>
                    <select name="account_type" id="account_type" class="form-control" required>
                        <option value="Savings">Savings </option>
                        <option value="Checking">Checking </option>
                        <option value="Recurring Deposit">Recurring Deposit</option>
                        <option value="Fixed Deposit">Fixed Deposit</option>
                    </select>
                    <div class="invalid-feedback">
                        Select Account type
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="swift_code">Swift code</label>
                    <input type="text" class="form-control" id="swift_code"
                        placeholder="Recipient's Swift Code" required name="swift_code">
                    <div class="invalid-feedback">
                        Please enter recipient swift code.
                    </div>
                </div>
            </div>

            <button class="btn btn-primary btn-lg pull-right p-2" onclick="loading(this)"
                type="submit">Transfer </button>
        </form>

        <script>
            function loading(el) {
                el.innerHTML += '<span id="loader" class="spinner-grow spinner-grow-sm text-sm" role="status" aria-hidden="true"></span>';
            }
            function removeLoader() {
                var el = document.getElementById('loader');
                el.remove();
            }
            // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function () {
                        var validFormData;
                        function submitForm(data)
                        {
                            const options = {
                                method: 'POST',
                                body: JSON.stringify(data),
                                headers: {
                                    'Content-Type': 'application/json'
                                }
                            }
                            fetch('/dashboard/validate-transfer', options)
                                .then(res => res.json())
                                .then(res => {
                                    if(!res.success){
                                        Swal.fire(
                                        res.title,
                                        res.message,
                                        'info'
                                        )
                                        removeLoader();
                                    }else{
                                        // Swal.fire(
                                        // 'Success!',
                                        // res.message,
                                        // 'success'
                                        // )
                                        SendNValOTP()

                                        // setTimeout(()=>{
                                        //     window.location.href="{{route('transfers')}}"
                                        // },4000)
                                    }
                                })
                        }

                            function SendNValOTP()
                        {
                            fetch('/dashboard/send-otp?amount='+validFormData.amount+'&name='+validFormData.reciepient_name)
                            .then(res => res.json())
                            .then(res => {
                                if(!res.success)
                                {
                                    removeLoader();
                                    Swal.fire(
                                        'Failed!',
                                        res.message,
                                        'error'
                                        )
                                }else{
                                    validateOtp(res.message)
                                }
                            });

                        }

                        function validateOtp (msg){
                            removeLoader();
                            Swal.fire({
                                title: msg,
                                input: 'text',
                                inputAttributes: {
                                    autocapitalize: 'off'
                                },
                                showCancelButton: true,
                                confirmButtonText: 'Validate',
                                showLoaderOnConfirm: true,
                                preConfirm: (token) => {
                                    validFormData.token = token;
                                    const options = {
                                        method: 'POST',
                                        body: JSON.stringify(validFormData),
                                        headers: {
                                            'Content-Type': 'application/json'
                                        }
                                    }
                                            return fetch(`/dashboard/validate-otp`,options)
                                    .then(response => response.json())
                                    .then(res => {
                                        // console.log(res)
                                        if (!res.success) {
                                        throw new Error(res.message)
                                        }
                                        return res;
                                    })
                                    .catch(error => {
                                        Swal.showValidationMessage(
                                        `Transfer failed: ${error}`
                                        )
                                    })
                                },
                                allowOutsideClick: () => !Swal.isLoading()
                                }).then((result) => {
                                if (result.value.success) {
                                    Swal.fire(
                                        'Success!',
                                        `${result.value.message}`,
                                        'success'
                                        ).then(()=>{
                                            location.href= "{{route('transfers')}}"
                                        })
                                }else{
                                    Swal.fire(
                                        'Failed!',
                                        `${result.value.message}`,
                                        'failed'
                                        )
                                }
                            })
                        }


                        function mustBeNumber(elements){
                            invalid = true
                            elements.map(function(element){
                                if(isNaN(element.value)){
                                    invalid = false;
                                    var eleName = element.previousElementSibling.innerHTML
                                    var nextEle = element.nextElementSibling;
                                    nextEle.innerHTML = eleName +" must be a number"
                                    nextEle.style.display = "block"
                                }
                            })
                            return invalid;
                        }

                        'use strict';
                        window.addEventListener('load', function () {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            var valid = false;
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function (
                            form) {
                                form.addEventListener('submit', function (event) {
                                    event.preventDefault();
                                    event.stopPropagation()
                                    var bank_name = form.bank_name;
                                    var amount = form.amount;
                                    var account_number = form.account_number;
                                    var swift_code = form.swift_code;
                                    var routing_number = form.routing_number;
                                    var token = form._token;
                                    var reciepient_name = form.reciepient_name;
                                    var iban = form.iban;
                                    var account_type = form.account_type;



                                    if(form.amount.validity.rangeOverflow === true){
                                        var feedback =  form.amount.nextElementSibling//.style.display = "block"
                                        feedback.innerHTML = "Amount cannot be higher than your balance"
                                        feedback.style.display="block"
                                    }

                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }

                                    isvalid = mustBeNumber([amount,account_number,swift_code,routing_number])


                                    data = validFormData = {
                                        "bank_name":bank_name.value,
                                        "amount":amount.value,
                                        "account_number":account_number.value,
                                        "swift_code":swift_code.value,
                                        "routing_number":routing_number.value,
                                        "_token":token.value,
                                        "reciepient_name":reciepient_name.value,
                                        "iban_number":iban.value,
                                        "account_type":account_type.value
                                    }


                                        submitForm(data);
                                    form.classList.add('was-validated');



                                }, false);
                            });
                        }, false);
                    })();
        </script>
    </div>
</div>
@endsection

