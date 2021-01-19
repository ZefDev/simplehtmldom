<?php
require_once 'simple_html_dom.php';

class parser
{
  private $addres;
  private $team;
  private $addres_archive;

  function __construct($team)
  {
    $this->addres = 'https://terrikon.com';
    $this->addres_archive = 'https://terrikon.com/football/italy/championship/archive';
    $this->team = $team;
  }
  function get_addres()
  {
      return $this->addres;
  }
  function set_addres($value)
  {
      $this->addres = $value;
  }
  function get_addres_archive()
  {
      return $this->addres_archive;
  }
  function set_addres_archive($value)
  {
      $this->addres_archive = $value;
  }
  function get_team()
  {
      return $this->team;
  }
  function set_team($value)
  {
      $this->team = $value;
  }

  private function get_list_archive()
  {
    $table_links = array();
    $html = file_get_html($this->addres_archive);
    // Find all links on the table
    foreach($html->find('div.tab div.news dl dd a[href*=/football/italy/championship/]') as $element){
      $link_seson = $this->addres.$element->href;
      $arr = explode(",",str_replace(".",",", $element->plaintext));
      $table_links[$arr[0]] = $link_seson;
    }
    return $table_links;
  }

  private function get_list_results($table_links)
  {
    foreach ($table_links as $key => $value) {

      $html_table = file_get_html($value);
      foreach($html_table->find('div.tab table[class=colored big] tr') as $element){
        $temp_place = $element->children(0)->plaintext;
        $temp_team = $element->children(1)->plaintext;
        if (strcasecmp($this->team, $temp_team) == 0) {
            echo "Команда $temp_team заняла $temp_place место в сезоне $key <br>";
        }
      }
    }
  }

  public function get_result($team)
  {
    $this->get_list_results(  $this->get_list_archive());
  }
}
 ?>
