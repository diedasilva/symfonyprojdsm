<?php
// src/Command/CreateUserCommand.php
namespace App\Command;

use ApiPlatform\Symfony\Bundle\Test\Client;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Entity\Cocktail;

#[AsCommand(
    name: 'app:commanddata',
    description: 'Creates new cocktails',
    hidden: false,
    aliases: ['app:commanddata']
)]
class CommandData extends Command
{
    public function __construct(EntityManagerInterface $em,HttpClientInterface $client)
    {
        parent::__construct();
        $this->client = $client;
        $this->em = $em;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Call API to get cocktail data
        $api = $this->client->request('GET', 'https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita');
        $data = $api->getContent();

        // Decode JSON data
        $jsondata = json_decode($data);
        $output->writeln($jsondata->drinks[0]->strDrink);

        // Loop over cocktails and save to database
        for($i = 0; $i <= 5; $i++) {
            $cocktail = new Cocktail();
            $cocktail->setStrDrink($jsondata->drinks[$i]->strDrink);
            $cocktail->setStrInstructions($jsondata->drinks[$i]->strInstructions);
            $cocktail->setStrIngredient1($jsondata->drinks[$i]->strIngredient1);
            $cocktail->setStrIngredient2($jsondata->drinks[$i]->strIngredient2);
            $cocktail->setStrIngredient3($jsondata->drinks[$i]->strIngredient3);
    
            $this->em->persist($cocktail);
        }

        // Save changes to database
        $this->em->flush();

        return Command::SUCCESS;
    }
}
