<?php
class position
{
    public $x;
    public $y;
}
class player
{
    public $color;
    public $player_name;
    function movie(piece $pi ,position $pos)
    {

    }
}
 abstract class piece
{
     public $color;
     public $name;
     public position $position;
     public function __construct()
     {
         $this->position=new position();
     }
     abstract function move(position $pos);
     abstract function am_i_cheched();
}

class board
{
  public array $piece=[];
  public function show_board()
  {
      for($row=0;$row<8;$row++)
      {
          $bgc=0;
          $fgc=0;
          for($h=0;$h<8;$h++)
          {
              if ((isset( ($this->piece[$row][$h]))))
                  echo "\e[0;30;43m".$this->piece[$row][$h]->name."\e[0m";
          }
          echo "\n";
      }
  }
  public function init()
  {
    //$board=new board();
      //$this->piece[0][0]=[];
      $this->piece[0][0]=new rook();
      $this->piece[0][0]->color="black";
      $this->piece[0][0]->positin=new position();
      $this->piece[0][0]->positin->x=0;
      $this->piece[0][0]->positin->y=0;
      $this->piece[0][7]=new rook();
      $this->piece[0][7]->color="black";
      $this->piece[0][7]->positin=new position();
      $this->piece[0][7]->positin->x=0;
      $this->piece[0][7]->positin->y=7;

      $this->piece[0][1]=new knight();
      $this->piece[0][1]->color="black";
      $this->piece[0][1]->positin=new position();
      $this->piece[0][1]->positin->x=0;
      $this->piece[0][1]->positin->y=1;
      $this->piece[0][6]=new knight();
      $this->piece[0][6]->positin=new position();
      $this->piece[0][6]->color="black";
      $this->piece[0][6]->positin->x=0;
      $this->piece[0][6]->positin->y=6;


      $this->piece[0][2]=new bishop();
      $this->piece[0][2]->color="black";
      $this->piece[0][2]->positin=new position();
      $this->piece[0][2]->positin->x=0;
      $this->piece[0][2]->positin->y=2;
      $this->piece[0][5]=new bishop();
      $this->piece[0][5]->color="black";
      $this->piece[0][5]->positin=new position();
      $this->piece[0][5]->positin->x=0;
      $this->piece[0][5]->positin->y=5;


      $this->piece[0][3]=new qeen();
      $this->piece[0][3]->color="black";
      $this->piece[0][3]->positin=new position();
      $this->piece[0][3]->positin->x=0;
      $this->piece[0][3]->positin->y=3;

      $this->piece[0][4]=new king();
      $this->piece[0][4]->color="black";
      $this->piece[0][4]->positin=new position();
      $this->piece[0][4]->positin->x=0;
      $this->piece[0][4]->positin->y=4;


//      var_dump($this->piece[0][0]);
      for ($i=0;$i<8;$i++)
      {
          $this->piece[1][$i]=new pawn();
          $this->piece[1][$i]->color="black";

          $this->piece[1][$i]->positin=new position();
          $this->piece[1][$i]->positin->x=1;
          $this->piece[1][$i]->positin->y=$i;
  //        var_dump($this->piece[1][$i]);
      //
      }
//var_dump($this->piece);
  }
  public function showboard()
  {

  }
}
 class game
{
  public $turn="whitePlayer";
  public board $board;
  public function run()
  {
      $this->board=new board();
      $this->board->init();
  }
}

class rook extends piece
{
    public $name="R";

    public function move(position $pos)
    {

    }
    public function am_i_cheched()
    {
        // TODO: Implement am_i_cheched() method.

    }

}
class pawn extends piece
{
    public $name="P";
    public function move(position $pos)
    {
        // TODO: Implement move() method.
    }
    public function am_i_cheched()
    {
        // TODO: Implement am_i_cheched() method.
    }

}

class king extends piece
{
    public $name="K";
    public function move(position $pos)
    {
        // TODO: Implement move() method.
    }
    public function am_i_cheched()
    {
        // TODO: Implement am_i_cheched() method.
    }

}


class qeen extends piece
{
    public $name="Q";
    public function move(position $pos)
    {
        // TODO: Implement move() method.
    }
    public function am_i_cheched()
    {
        // TODO: Implement am_i_cheched() method.
    }

}

class bishop extends piece
{
    public $name="B";
    public function move(position $pos)
    {
        // TODO: Implement move() method.
    }
    public function am_i_cheched()
    {
        // TODO: Implement am_i_cheched() method.
    }

}


class knight extends piece
{
    public $name="N";
    public function move(position $pos)
    {
        // TODO: Implement move() method.
    }
    public function am_i_cheched()
    {
        // TODO: Implement am_i_cheched() method.
    }

}





$game=new game();
$game->run();
$game->board->show_board();