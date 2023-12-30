<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class AuthCheckFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the user is not logged in and redirect if necessary
        if (!session()->has('logged_in')) {
            return redirect()->to('/main')->with('fail', 'You must be logged in to access this page!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // This filter does not perform any action after the request is processed
    }
}