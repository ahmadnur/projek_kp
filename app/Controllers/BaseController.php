<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        date_default_timezone_set("Asia/Jakarta");

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->datadiriModel = new \App\Models\DatadiriModel();
        $this->interviewModel = new \App\Models\InterviewModel();
        $this->keluargaModel = new \App\Models\KeluargaModel();
        $this->pendidikanModel = new \App\Models\PendidikanModel();
        $this->kursusModel = new \App\Models\KursusModel();
        $this->bahasaModel = new \App\Models\BahasaModel();
        $this->pengalamanModel = new \App\Models\PengalamanModel();
        $this->kenalanModel = new \App\Models\KenalanModel();
        $this->kegiatanModel = new \App\Models\KegiatanModel();
        $this->keteranganModel = new \App\Models\KeteranganModel();
        $this->interviewModel = new \App\Models\InterviewModel();
        $this->jabatanModel = new \App\Models\JabatanModel();
        $this->jenis_ijinModel = new \App\Models\Jenis_ijinModel();
        $this->status_daftarModel = new \App\Models\Status_DaftarModel();
        $this->uploadModel = new \App\Models\UploadModel();
        $this->absensiModel = new \App\Models\AbsensiModel();
        $this->karyawanModel = new \App\Models\KaryawanModel();
        $this->seleksiModel = new \App\Models\SeleksiModel();
        $this->lowonganModel = new \App\Models\LowonganModel();
        session();
    }
}
