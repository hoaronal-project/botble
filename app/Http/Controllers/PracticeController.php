<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PracticeInterface;

class PracticeController extends Controller
{
    //
    /**
    *Dependency injection*/
    private $practice;
    public function __construct(PracticeInterface $practice)
    {
        $this->practice = $practice;
    }
/**Export list a model to file excel*/
    public function exportExcel()
    {
        return $this->practice->exportModelToExcel();
    }
}
