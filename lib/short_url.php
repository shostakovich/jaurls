<?php
class ShortUrlNotFound extends Exception {}

class NoShortUrl
{
  public function getLongUrl()
  {
    throw new ShortUrlNotFound;
  }
}

class ShortUrl
{
  private $shortUrl, $longUrl;

  public function __construct($shortUrl, $longUrl)
  {
    $this->shortUrl = $shortUrl;
    $this->longUrl = $longUrl;
  }

  public function getLongUrl()
  {
    return $this->longUrl;
  }
}
