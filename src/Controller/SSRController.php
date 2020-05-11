<?php
// src/Controller/SSRController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Spatie\Ssr\Renderer;
use Spatie\Ssr\Engines\Node;
use Spatie\Ssr\Exceptions\EngineError;

class SSRController extends AbstractController
{
	/**
	* @Route("/ssr/example")
	*/
	private $nodePath, $tempPath;

	public function number()
	{
		$number = random_int(0, 100);
		$this->nodePath = '/usr/local/bin/node';
		$this->tempPath = __DIR__.'/../../public/';

		$engine = new Node($this->nodePath, $this->tempPath);

		$renderer = new Renderer($engine);
		
		$title = 'Hello from PHP!';
		
		$test = $renderer->entry(__DIR__.'/../../public/server.js')->context('title', $title)->render();

		return $this->render('ssr/ssr-example.html.twig', [
			'test' => $test,
			'title' => $title
		]);
	}
}