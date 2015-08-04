<?php
//rss.php

class Rss extends CI_Controller {



public function index()
{
    
  //$request = "http://rss.news.yahoo.com/rss/software";
    /*
    
    https://www.google.com/search?hl=en&gl=us&tbm=nws&authuser=0&q=florida+gators+football&oq=flori&gs_l=news-cc.1.4.43j0l10j43i53.121090.121979.0.126982.5.5.0.0.0.0.170.434.4j1.5.0...0.0...1ac.1.uEEpLwNO0J8
    
    */
    
    
  $request = "https://news.google.com/news??hl=en&gl=us&tbm=nws&authuser=0&q=florida+gators+football&output=rss"; 

  $response = file_get_contents($request);
  $xml = simplexml_load_string($response);
  print '<h1>' . $xml->channel->title . '</h1>';
  foreach($xml->channel->item as $story)
  {
    echo '<a href="' . $story->link . '">' . $story->title . '</a><br />'; 
    echo '<p>' . $story->description . '</p><br /><br />';
  }
    
    
//$data['news'] = $this->news_model->get_news();
//$data['title'] = 'News archive';

//$this->load->view('templates/header', $data);
//$this->load->view('news/index', $data);
//$this->load->view('templates/footer');
}//end index()


    
    
    
    
}//end rss