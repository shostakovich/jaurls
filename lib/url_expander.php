<?php
class UrlExpander
{
  private $repository;

  public function __construct($repository)
  {
    $this->repository = $repository;
  }

  public function expand($path)
  {
    $shortUrl = $this->repository->lookup($path);
    return $shortUrl->getLongUrl();
  }
}
