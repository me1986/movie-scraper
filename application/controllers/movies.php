<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movies extends CI_Controller {

    public function index() {    
        $this->load->view('movies/index');
    }
   
    public function processzip($zipCode) {
    	$this->load->helper('simple_html_dom');
        $ch = curl_init();
        
        if(!isset($zipCode)) {
            $zipCode = "10019";
        } 
      
        curl_setopt_array(
            $ch, array(
                CURLOPT_URL => 'http://www.fandango.com/'.$zipCode.'_movietimes',
                CURLOPT_RETURNTRANSFER => true
         ));
        
        $response = curl_exec($ch);
        curl_close($ch); 
     
		$html = new simple_html_dom();
		$html->load($response);
		
		$theaterCount = 0;
		$results = array();
        
        ## loop through each theater
		foreach($html->find('.showtimes-theater') as $theaters) {
			
			foreach($theaters->find('.showtimes-theater-title') as $names){
				$theaterName = $names->plaintext;
				$results[$theaterCount]['theater_name'] = $theaterName;
			}
			
			foreach($theaters->find('.showtimes-theater-address') as $address){
				$address = $address->plaintext;
				$results[$theaterCount]['address'] = $address; 
			}
            
            $titleCounter = 0;
            foreach($theaters->find('.showtimes-movie-title') as $titles) {
                $title = $titles->plaintext;
                $results[$theaterCount][$titleCounter]['title'] = $title; 
                $titleCounter++;
            }
			
            
            $runCounter = 0;
            foreach($theaters->find('.showtimes-movie-rating-runtime') as $runTimes) {
                $runTime = $runTimes->plaintext;
                $results[$theaterCount][$runCounter]['runtime'] = $runTime; 
                $runCounter++;
            }

            $showTimeCounter = 0;
            foreach($theaters->find('.showtimes-times') as $showTimes) {
                $showTime = $showTimes->plaintext;
                $results[$theaterCount][$showTimeCounter]['showtime'] = $showTime;
                $showTimeCounter++; 
            }
           
            $theaterCount++;
					
		}
		
        echo json_encode($results);
			
    }
    
    
    public function test() {
        echo "test";
    }
    
   
}

