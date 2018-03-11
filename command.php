<?php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

$application->register('greet')
    ->addArgument('name', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->addOption('yell', null, \Symfony\Component\Console\Input\InputOption::VALUE_NONE)
    ->setCode(function($input, $output) {
       $name = $input->getArgument('name');
       $greeting = sprintf('Hey <comment>' . $name. '!</comment>');

       if ($input->getOption('yell')) {
           $greeting = strtoupper($greeting);
       }

       $output->writeln($greeting);
    });

$application->run();