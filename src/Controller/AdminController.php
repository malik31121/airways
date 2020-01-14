<?php

namespace App\Controller;

use App\Entity\Flight;
use App\Form\FlightType;
use App\Repository\FlightRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_home")
     */
    public function listeVol(FlightRepository $repo)
    {
        $flights = $repo->findAll();
        return $this->render('admin/listeVol.html.twig', [
            'flights'=> $flights
        ]);
    }

    /**
     * @Route("/admin/new", name="admin_new")
     */
    public function new(Request $request)
    {    
        $flight = new Flight();
        $form = $this->createForm(FlightType::class, $flight);
        return $this->render('admin/create.html.twig', [
            'myform' => $form->createView()
        ]);
    }


    /**
     * @Route("/admin/edit/{id}", name="admin_edit")
     */
    public function edit(Request $request, $id)
    {
    }

    /**
     * @Route("/admin/delete/{id}", name="admin_delete")
     */
    public function delete(Request $request, $id)
    {
    }



}
