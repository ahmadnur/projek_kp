<!DOCTYPE html>
<!--
Template Name: Tinker - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Register</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="<?= base_url('css/output.css')     ?>">
    <link rel="stylesheet" href="<?= base_url('css/app.css')     ?>">
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Register Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="/" class="-intro-x flex items-center pt-5">
                    <img class="w-6">
                    <span class="text-white text-lg ml-3"> PT DSSA</span>
                </a>
                <div class="my-auto">
                    <img class="-intro-x w-1/2 -mt-16" src="/images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        A few more clicks to
                        <br>
                        Register to your account.
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage all your e-commerce accounts in one place</div>
                </div>
            </div>
            <!-- END: Register Info -->
            <!-- BEGIN: Register Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <!-- <div id="form-validation">
                        <div class="previes"> -->
                    <form action="/login/edit2/<?php echo session()->get('id');    ?>" method="POST">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Edit Pasword
                        </h2>
                        <?php if (!empty(session()->getFlashdata('pass'))) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('pass'); ?>
                                <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                            </div>
                        <?php endif; ?>
                        <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <div class="intro-x mt-8">
                            <input type="password" id="pass" class="intro-x login__input form-control py-3 px-4 block mt-4" name="conf" id="validation-form-2" placeholder="password Lama">
                            <input type="hidden" id="old" name="old" value="<?php echo session()->get('password')    ?>">
                            <input type="password" id="pass1" class="intro-x login__input form-control py-3 px-4 block mt-4 mb-3" name="password" placeholder="Password">
                            <div class="t col-span-4 text-red-500 text-xs italic whitespace-nowrap">
                                <?= $validation->getError('password');   ?></div>
                            <input type="checkbox" id="check" name="cek" class="form-control w-5" onclick="Mypass()"> Show Password
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button type="submit" onclick="return confirm('apakah anda yakin?')" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Edit</button>

                            </div>
                    </form>
                </div>
                <!-- </div>
                </div> -->
            </div>
            <!-- END: Register Form -->
        </div>
    </div>

    <!-- BEGIN: JS Assets-->
    <script src="<?= base_url('js/app.js')   ?>"></script>
    <!-- END: JS Assets-->
    <script>
        function Mypass() {
            var x = document.getElementById("pass");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            var y = document.getElementById("pass1");
            if (y.type == "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
    </script>
</body>

</html>