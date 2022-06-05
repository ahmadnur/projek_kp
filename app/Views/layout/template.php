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
<html lang="en" class="light scroll-smooth">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <!-- <link href="dist/images/logo.svg" rel="shortcut icon"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title><?= $halaman;   ?></title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="<?= base_url('css/output.css')     ?>">
    <link rel="stylesheet" href="<?= base_url('css/app.css')     ?>">

    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="" class="w-6" src="">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-white/[0.08] py-5 hidden">
            <li>
                <a href="/" class="menu">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title"> Dashboard </div>
                </a>
            </li>

            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                    <div class="menu__title"> Pendaftaran <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="/pendaftaran/baru" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Baru </div>
                        </a>
                    </li>
                    <li>
                        <a href="/pendaftaran/jabatan" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Jabatan </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-lucide="users"></i> </div>
                    <div class="menu__title"> Karyawan<i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="/home/karyawan" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title">Karyawan Masuk </div>
                        </a>
                    </li>
                    <li>
                        <a href="/home/resign" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title">Karyawan Keluar </div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <a href="/home/performa" class="menu">
                    <div class="menu__icon"> <i data-lucide="credit-card"></i> </div>
                    <div class="menu__title"> Performa </div>
                </a>
            </li> -->
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-lucide="calendar"></i> </div>
                    <div class="menu__title"> Absensi <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="/absensi/upload" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Upload </div>
                        </a>
                    </li>
                    <li>
                        <a href="/absensi/harian" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Harian </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                    <div class="menu__title"> Laporan <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                </a>
                <ul class="">
                    <!-- <li>
                        <a href="/laporan/karyawan" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Karyawan </div>
                        </a>
                    </li>
                    <li>
                        <a href="/laporan/masuk" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Karyawan Masuk </div>
                        </a>
                    </li>
                    <li>
                        <a href="/laporan/keluar" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Karyawan Keluar </div>
                        </a>
                    </li> -->
                    <li>
                        <a href="/laporan/absensi" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Absensi </div>
                        </a>
                    </li>
                    <li>
                        <a href="/laporan/cuti" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Cuti </div>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="/laporan/performa" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Performa </div>
                        </a>
                    </li> -->
                    <li>
                        <a href="/laporan/recruitment" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title">Recruitment </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-lucide="trello"></i> </div>
                    <div class="menu__title"> Recruitment <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="/recruitment/lowongan" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Lowongan </div>
                        </a>
                    </li>
                    <li>
                        <a href="/recruitment/seleksi" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Seleksi </div>
                        </a>
                    </li>
                    <li>
                        <a href="recruitment/databaru" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Data Baru </div>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex overflow-hidden">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4 mt-3">
                <img alt="" class="w-6" src="">
                <span class="hidden xl:block text-white text-lg ml-3"> Admin </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="/" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                        <div class="side-menu__title">
                            Pendaftaran
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="/pendaftaran/baru" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Baru </div>
                            </a>
                        </li>
                        <li>
                            <a href="/pendaftaran/jabatan" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title">Jabatan </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="side-menu__title">
                            Karyawan
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="/home/karyawan" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title">Karyawan Masuk </div>
                            </a>
                        </li>
                        <li>
                            <a href="/home/resign" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title">Karyawan Keluar </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="/home/performa" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="credit-card"></i> </div>
                        <div class="side-menu__title">Performa </div>
                    </a>
                </li> -->
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                        <div class="side-menu__title">
                            Absensi
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="/absensi/harian" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Harian </div>
                            </a>
                        </li>
                        <li>
                            <a href="/absensi/upload" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Upload </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                        <div class="side-menu__title">
                            Laporan
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <!-- <li>
                            <a href="/laporan/karyawan" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Karyawan</div>
                            </a>
                        </li>
                        <li>
                            <a href="/laporan/masuk" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Karyawan Masuk</div>
                            </a>
                        </li>
                        <li>
                            <a href="/laporan/keluar" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Karyawan Keluar</div>
                            </a>
                        </li> -->
                        <li>
                            <a href="/laporan/absensi" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Absensi</div>
                            </a>
                        </li>
                        <li>
                            <a href="/laporan/cuti" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Cuti</div>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="/laporan/performa" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Performa</div>
                            </a>
                        </li> -->
                        <li>
                            <a href="/laporan/recruitment" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Recruitment</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="trello"></i> </div>
                        <div class="side-menu__title">
                            Recruitment
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="/recruitment/lowongan" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title">Lowongan </div>
                            </a>
                        </li>
                        <li>
                            <a href="/recruitment/seleksi" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Seleksi</div>
                            </a>
                        </li>
                        <li>
                            <a href="/recruitment/databaru" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Data Baru</div>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Application</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $halaman;   ?></li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <!-- <div>
                        <input type="text" id="search2" name="search" placeholder="Nama Karyawan" class="form-control">
                    </div>
                    <ul class="list-group" id="list_nama"></ul> -->
                    <div class="search hidden sm:block">
                        <input type="text" class="search__input form-control border-transparent" id="search2" name="search" placeholder="Search...">
                        <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                    </div>
                    <a class="notification sm:hidden" href="/home/karyawan"> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
                    <div class="search-result">
                        <div class="search-result__content">

                            <div class="search-result__content__title">Karyawan</div>
                            <div class="mb-5" id="list_nama">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->
                <!-- <div class="intro-x dropdown mr-auto sm:mr-6">
                    <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-content">
                            <div class="notification-content__title">Notifications</div>
                            <div class="cursor-pointer relative flex items-center ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="" class="rounded-full" src="">
                                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Keanu Reeves</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg items-center image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary text-white">
                            <li class="p-2">
                                <div class="font-medium text-xl text-center"><?php echo session()->get('nama_admin')    ?></div>
                                <div class="text-xs text-center text-white/70 mt-0.5 dark:text-slate-500"><?php echo session()->get('jabatan_admin')    ?></div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                            </li>
                            <li>
                                <a href="/login/register" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                            </li>
                            <li>
                                <a href="/login/edit" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                            </li>
                            <!-- <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                            </li> -->
                            <li>
                                <a href="/home/admin" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Admin </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="/login/logout" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->
            <div class=" relative intro-y news  p-5 box mt-8">
                <!-- BEGIN: Blog Layout -->
                <?php if (empty($data_masuk)) {
                    $data_masuk = "0";
                }
                if (empty($data_resign)) {
                    $data_resign = "0";
                }
                if (empty($jabat3)) {
                    $jabat3 = "0";
                }
                if (empty($data_jabat)) {
                    $data_jabat = "0";
                }
                if (empty($data_absen)) {
                    $data_absen = "0";
                }
                if (empty($data_ijin)) {
                    $data_ijin = "0";
                }
                ?>

                <?= $this->renderSection('content');   ?>


                <!-- END: Blog Layout -->

            </div>
        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <!-- <div data-url="side-menu-light-blog-layout-3.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
        <div class="dark-mode-switcher__toggle dark-mode-switcher__toggle--active border"></div>
    </div> -->
    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="<?= base_url('js/app.js')   ?>"></script>
    <script src="<?= base_url('js/jquery-3.6.0.min.js')   ?>"></script>
    <script src="<?= base_url('js/jquery-ui.js')   ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- END: JS Assets-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        $(function() {
            Highcharts.chart('karyawan_masuk', {
                chart: {
                    type: 'spline',
                },
                title: {
                    text: 'Karyawan Yang Diterima tahun ini'
                },

                yAxis: {
                    title: {
                        text: 'Total Karyawan'
                    }
                },

                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Jumlah',
                    data: <?= $data_masuk;   ?>,
                }],
            });
        });
        $(function() {
            Highcharts.chart('karyawan_keluar', {
                chart: {
                    type: 'spline',
                },
                title: {
                    text: 'Karyawan Yang Resign'
                },

                yAxis: {
                    title: {
                        text: 'Total Karyawan'
                    }
                },

                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Jumlah',
                    data: <?= $data_resign;   ?>,
                }],
            });
        });
        $(function() {
            Highcharts.chart('absensi', {
                chart: {
                    type: 'spline',
                },
                title: {
                    text: 'Absensi'
                },

                yAxis: {
                    title: {
                        text: 'Total Karyawan'
                    }
                },

                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                        name: 'masuk',
                        data: <?= $data_absen;   ?>,
                    },
                    {
                        name: 'tidak masuk',
                        data: <?= $data_ijin;   ?>,
                    }
                ],
            });
        });
        $(function() {
            Highcharts.chart('pendaftar', {
                chart: {
                    type: 'spline',
                },
                title: {
                    text: 'Jumlah Karyawan'
                },

                yAxis: {
                    title: {
                        text: 'Total Karyawan'
                    }
                },

                xAxis: {
                    categories: <?= $jabat3;   ?>,
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Jumlah',
                    data: <?= $data_jabat;   ?>,
                }],
            });
        });
        $(document).ready(function() {
            $("#next1").click(function() {
                $("#pertama").hide();
                $("#kedua").show();
            });
            $("#previous2").click(function() {
                $("#kedua").hide();
                $("#pertama").show();
            });
            $("#next2").click(function() {
                $("#kedua").hide();
                $("#ketiga").show();
            });
            $("#previous3").click(function() {
                $("#ketiga").hide();
                $("#kedua").show();
            });
            $("#next3").click(function() {
                $("#ketiga").hide();
                $("#keempat").show();
            });
            $("#previous4").click(function() {
                $("#keempat").hide();
                $("#ketiga").show();
            });
            $("#next4").click(function() {
                $("#keempat").hide();
                $("#kelima").show();
            });
            $("#previous5").click(function() {
                $("#kelima").hide();
                $("#keempat").show();
            });
            $("#next5").click(function() {
                $("#kelima").hide();
                $("#keenam").show();
            });
            $("#previous6").click(function() {
                $("#keenam").hide();
                $("#kelima").show();
            });
            $("#next6").click(function() {
                $("#keenam").hide();
                $("#ketujuh").show();
                $("#delapan").show();
            });
            $("#previous7").click(function() {
                $("#ketujuh").hide();
                $("#delapan").hide();
                $("#keenam").show();
            });
        });
        $(document).ready(function() {
            $('#ya1').click(function() {
                $('#input1').hide();
            });
            $('#tidak1').click(function() {
                $('#input1').show();
            });
        });
        $(document).ready(function() {
            $('#ya2').click(function() {
                $('#input2').hide();
            });
            $('#tidak2').click(function() {
                $('#input2').show();
            });
        });
        $(document).ready(function() {
            $('#ya3').click(function() {
                $('#input3').show();
            });
            $('#tidak3').click(function() {
                $('#input3').hide();
            });
        });
        $(document).ready(function() {
            $('#ya4').click(function() {
                $('#input4').show();
            });
            $('#tidak4').click(function() {
                $('#input4').hide();
            });
        });
        $(document).ready(function() {
            $('#ya5').click(function() {
                $('#input5').show();
            });
            $('#tidak5').click(function() {
                $('#input5').hide();
            });
        });
        $(document).ready(function() {
            $('#ya6').click(function() {
                $('#input6').show();
            });
            $('#tidak6').click(function() {
                $('#input6').hide();
            });
        });
        $(document).ready(function() {
            $('#ya7').click(function() {
                $('#input7').show();
            });
            $('#tidak7').click(function() {
                $('#input7').hide();
            });
        });

        $(document).ready(function() {
            $('#ya8').click(function() {
                $('#input8').show();
            });
            $('#tidak8').click(function() {
                $('#input8').hide();
            });
        });

        $(document).ready(function() {
            $('#ya9').click(function() {
                $('#input9').show();
            });
            $('#tidak9').click(function() {
                $('#input9').hide();
            });
        });
        $(document).ready(function() {
            $('#search2').keyup(function() {
                $('#list_nama').html('');
                var searchField = $('#search2').val();
                var expression = new RegExp(searchField, "i");
                $.getJSON('/home/json_karyawan', function(data) {
                    $.each(data, function(key, value) {
                        if (value.nama.search(expression) != -1) {
                            $('#list_nama').append('<a href="/home/karyawan_prof/' + value.id_karyawan + '" class="flex items-center mt-2">\
                                    <div class="ml-3">' + value.nama + '</div>\
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">' + value.jabatan + '</div>\
                                </a>');

                        }

                    });
                })
            });
        });

        $('#posisi').on('change', function() {
            var jabatan = $('#posisi option:selected').data('jabatan');
            document.getElementById("posisilamar").value = jabatan;

        });
        $('#posisi2').on('change', function() {
            var jabatan = $('#posisi2 option:selected').data('jabatan2');
            document.getElementById("posisilamar2").value = jabatan;

        });
        $('#searching1').on('change', function() {
            var jab = $('#searching1 option:selected').data('jab');
            document.getElementById("id_jab").value = jab;

        });
        $('#searching1').on('change', function() {
            var stat = $('#searching1 option:selected').data('stat');
            document.getElementById("id_stat").value = stat;

        });

        function data2() {
            var tes = document.getElementById("searchkaryawan").value;
            <?php $id_kar  ?>
        }

        function data1() {
            var tes = document.getElementById("searching1").value;
            document.getElementById("id_daf").value = tes;
        }

        function tambah() {
            var isi = '<tr>\
            <td><select class="form-control" name="status_k[]" id="status">\
            <option value="Ayah">Ayah</option>\
            <option value="Ibu">Ibu</option>\
            <option value="Saudara">Saudara</option>\
            <option value="Suami/istri">Suami/istri</option>\
            <option value="Anak">Anak</option>\
            </select></td>\
            <td><input class="form-control" type="text" id="nama" name="nama_k[]" ></td>\
            <td><select class="form-control" name="jekel_k[]" id="jekel">\
                                                <option value="laki-laki">laki-laki</option>\
                                                <option value="perempuan">perempuan</option>\
                                            </select></td>\
            <td><input class="form-control" type="text" id="usia" name="usia_k[]" ></td>\
            <td><input class="form-control" type="text" id="pendidikan" name="pendidikan_k[]" ></td>\
            <td><input class="form-control" type="text" id="pekerjaan" name="pekerjaan_k[]" ></td>\
            <td><select class="form-control" name="m_bm[]" id="m_bm" >\
            <option value="Belum Menikah">Belum Menikah</option>\
            <option value="Sudah Menikah">Sudah Menikah</option>\
            </select></td>\
            <td style="border: none;"><a href="#" onclick="tambah();" class="btn-greeen ml-1 ">ADD</a></td>\
            <td style="border :none;"><a href="#" class="btn-red ml-6" onClick="$(this).closest(\'tr\').remove();">Delete</a></td>\
            </tr>';

            $('#1').append(isi);
        }

        function hapus() {
            $(this).closest('tr').remove();
        }

        function tambah2() {
            var isi = '<tr>\
                     <td><select class="form-control" name="status_p[]" id="" >\
                          <option value="SD">SD</option>\
                          <option value="SMP">SMP</option>\
                          <option value="SLTA">SLTA</option>\
                          <option value="Akademik">Akademik</option>\
                          <option value="Sarjana">Sarjana</option>\
                          <option value="Pasca Sarjana">Pasca Sarjana</option>\
                          </select></td>\
                          <td><input class="form-control" type="text" id="" name="nama_p[]" ></td>\
                          <td><input class="form-control" type="text" id="" name="jurusan_p[]" ></td>\
                          <td><input class="form-control" type="text" id="" name="IPK_p[]" ></td>\
                          <td><input class="form-control" type="text" id="" name="masuk_p[]" ></td>\
                          <td><input class="form-control" type="text" id="" name="keluar_p[]" ></td>\
                          <td style="border: none;"><a href="#" onclick="tambah2();" class="btn-greeen ml-1 ">ADD</a></td>\
                          <td style="border :none;"><a href="#" class="btn-red ml-6" onClick="$(this).closest(\'tr\').remove();">Delete</a></td>\
                          </tr>'
            $('#2').append(isi);
        }

        function tambah3() {
            var isi = '<tr>\
                            <td><input class="form-control" type="text" id="" name="jenis_ku[]" ></td>\
                            <td><input class="form-control" type="text" id="" name="tahun_ku[]" > </td>\
                            <td><input class="form-control" type="text" id="" name="durasi_ku[]" ></td>\
                                    <td><select class="form-control" name="keterangan_ku[]" id="" >\
                                            <option value="Berijazah">Berijazah</option>\
                                            <option value="Tidak Berijazah">Tidak Berijazah</option>\
                                        </select></td>\
                                    <td><input class="form-control" type="text" id="" name="dibiayai_ku[]" ></td>\
                                    <td style="border: none;"><a href="#" onclick="tambah3();" class="btn-greeen ml-1 ">ADD</a></td>\
                                    <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest(\'tr\').remove();">Delete</a></td>\
                                    </tr>'
            $('#3').append(isi);
        }

        function tambah4() {
            var isi = '<tr>\
                                    <td><select class="form-control" name="bahasa[]" id="bahasa">\
                                    <option value="Indonesia">Indonesia</option>\
                                    <option value="Inggris">Inggris</option>\
                                    <option value="Jepang">Jepang</option>\
                                    <option value="Cina">Cina</option>\
                                    <option value="Jerman">Jerman</option>\
                                    <option value="Jawa">Jawa</option>\
                                    </select>\
                                    </td>\
                                    <td>\
                                    <select class="form-control" name="aktif_pasif[]" id="aktif">\
                                    <option value="1">aktif</option>\
                                    <option value="0">pasif</option>\
                                    </select>\
                                    </td>\
                                    <td style="border: none;"><a href="#" onclick="tambah4();" class="btn-greeen ml-1 ">ADD</a></td>\
                                    <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest(\'tr\').remove();">Delete</a></td>\
                                    </tr>'
            $('#4').append(isi);
        }

        function tambah5() {
            var isi = '<tr>\
                    <td><input class="form-control" type="text" id="" name="tahun_masuk[]"></td>\
                    <td><input class="form-control" type="text" id="" name="tahun_keluar[]"></td>\
                    <td><input class="form-control" type="text" id="" name="nama_perusahaan[]"></td>\
                    <td><input class="form-control" type="text" id="" name="jabatan_p[]"></td>\
                    <td><input class="form-control" type="text" id="" name="gaji_tunjangan[]"></td>\
                    <td><input class="form-control" type="text" id="" name="alasan_p[]"></td>\
                    <td style="border: none;"><a href="#" onclick="tambah5();" class="btn-greeen ml-1 ">ADD</a></td>\
                    <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest(\'tr\').remove();">Delete</a></td>\
                    </tr>'
            $('#5').append(isi);
        }

        function tambah6() {
            var isi = '<tr>\
                      <td><input class="form-control" type="text" id="" name="nama_ken[]" ></td>\
                      <td><input class="form-control" type="text" id="" name="alamat_ken[]" ></td>\
                      <td><input class="form-control" type="text" id="" name="nmr_telp_ken[]" ></td>\
                      <td><input class="form-control" type="text" id="" name="jabatan_ken[]" ></td>\
                      <td><input class="form-control" type="text" id="" name="hubungan_ken[]" ></td>\
                      <td class="hidden"><input class="form-control" type="text" id="" name="status_ken[]" value="kenalan">\
                      <td style="border: none;"><a href="#" onclick="tambah6();" class="btn-greeen ml-1 ">ADD</a></td>\
                      <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest(\'tr\').remove();">Delete</a></td>\
                   </tr>'

            $('#6').append(isi);
        }

        function tambah7() {
            var isi = '<tr>\
                    <td><input class="form-control" type="text" id="" name="nama_ken[]" ></td>\
                    <td><input class="form-control" type="text" id="" name="alamat_ken[]" ></td>\
                    <td><input class="form-control" type="text" id="" name="nmr_telp_ken[]" ></td>\
                    <td><input class="form-control" type="text" id="" name="jabatan_ken[]" ></td>\
                    <td><input class="form-control" type="text" id="" name="hubungan_ken[]" ></td>\
                    <td class="hidden"><input class="form-control" type="text" id="" name="status_ken[]" value="referensi">\
                    <td style="border: none;"><a href="#" onclick="tambah7();" class="btn-greeen ml-1 ">ADD</a></td>\
                    <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest(\'tr\').remove();">Delete</a></td>\
                    </tr>'
            $('#7').append(isi);
        }

        function tambah8() {
            var isi = '<tr>\
            <td><input class="form-control"  type="text" id="" name="nama_o[]"></td>\
            <td><input class="form-control"  type="text" id="" name="jenis_o[]"></td>\
            <td><input class="form-control"  type="text" id="" name="tahun_o[]"></td>\
            <td><input class="form-control"  type="text" id="" name="jabatan_o[]"></td>\
            <td><select class="form-control" name="aktif_o[]" id="">\
                      <option value="aktif">aktif</option>\
                      <option value="tidak aktif">tidak aktif</option>\
            </select></td>\
            <td><textarea class="form-control" name="pengalaman_o[]" id="" cols="20" rows="2"></textarea></td>\
            <td style="border: none;"><a href="#" onclick="tambah8();" class="btn-greeen ml-1 ">ADD</a></td>\
            <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest(\'tr\').remove();">Delete</a></td>\
                        </tr>'
            $('#8').append(isi);
        }

        function preview() {
            const foto = document.querySelector('#foto');
            const imgpreview = document.querySelector('.img-preview');
            const filefoto = new FileReader();
            filefoto.readAsDataURL(foto.files[0]);
            filefoto.onload = function(e) {
                imgpreview.src = e.target.result;
            }
        }
    </script>


</body>

</html>