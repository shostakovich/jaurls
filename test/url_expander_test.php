<?php
use \Mockery as m;

require './lib/short_url.php';
require './lib/url_expander.php';

class UrlExpanderTestCase extends PHPUnit_Framework_TestCase
{
  public function test_expands_a_short_url_to_full_url()
  {
    $path = '/abc';
    $longUrl = 'http://example.com/example';
    
    $shortUrl = new ShortUrl($path, $longUrl);
    $repository = m::mock(array('lookup' => $shortUrl));

    $expander = new UrlExpander($repository);
    $this->assertEquals($longUrl, $expander->expand($path));
  }

  public function test_expander_throws_exception_when_url_does_not_exist()
  {
    $this->setExpectedException('ShortUrlNotFound');
    $repository = m::mock(array('lookup' => new NoShortUrl));

    $expander = new UrlExpander($repository);
    $expander->expand('/foo');
  }
}
