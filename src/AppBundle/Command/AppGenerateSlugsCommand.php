<?php

namespace AppBundle\Command;

use AppBundle\Entity\Author;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AppGenerateSlugsCommand extends ContainerAwareCommand
{
     private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct();

        $this->doctrine = $doctrine;
    }

    protected function configure()
    {
        $this
            ->setName('app:generate-slugs')
            ->setDescription('Slugs de registros existentes')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $argument = $input->getArgument('argument');
        $manager = $this->doctrine->getManager();


        if ($input->getOption('option')) {
            // ...
        }


        foreach ($manager->getRepository(Author::class)->findAll() as $entity) {

            $entity->setSlug(null);
        }

        $manager->flush();
        $manager->clear();


        $output->writeln('Slugs actualizados');
    }

}
