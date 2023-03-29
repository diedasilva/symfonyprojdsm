<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFormController extends AbstractController
{
    /**
     * @Route("/register", name="user_register")
     */
    public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        // Create a new user entity
        $user = new User();

        // Create the registration form
        $form = $this->createForm(UserRegistrationFormType::class, $user);

        // Handle the form submission
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Hash the user's password
            $password = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setRoles(["ROLE_USER"]);

            // Save the user to the database
            $entityManager->persist($user);
            $entityManager->flush();

            // Redirect the user to the login page
            return $this->redirectToRoute('/api');
        }

        // Display the registration form
        return $this->render('user/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
