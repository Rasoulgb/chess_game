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
    public array $block = [];

    public function show_board()
    {
        for ($row = 0; $row < 8; $row++)
        {
            $bgc = 0;
            $fgc = 0;
            for ($h = 0; $h < 8; $h++)
            {
                if ((isset(($this->block[$row][$h]))))
                    echo "\e[0;30;43m" . $this->block[$row][$h]->name . "\e[0m";
            }
            echo "\n";
        }
    }

    public function init()
    {
        //$board=new board();
        //$this->piece[0][0]=[];
        $this->block[0][0] = new rook();
        $this->block[0][0]->color = "black";
        $this->block[0][0]->positin = new position();
        $this->block[0][0]->positin->x = 0;
        $this->block[0][0]->positin->y = 0;
        $this->block[0][7] = new rook();
        $this->block[0][7]->color = "black";
        $this->block[0][7]->positin = new position();
        $this->block[0][7]->positin->x = 0;
        $this->block[0][7]->positin->y = 7;

        $this->block[0][1] = new knight();
        $this->block[0][1]->color = "black";
        $this->block[0][1]->positin = new position();
        $this->block[0][1]->positin->x = 0;
        $this->block[0][1]->positin->y = 1;
        $this->block[0][6] = new knight();
        $this->block[0][6]->positin = new position();
        $this->block[0][6]->color = "black";
        $this->block[0][6]->positin->x = 0;
        $this->block[0][6]->positin->y = 6;


        $this->block[0][2] = new bishop();
        $this->block[0][2]->color = "black";
        $this->block[0][2]->positin = new position();
        $this->block[0][2]->positin->x = 0;
        $this->block[0][2]->positin->y = 2;
        $this->block[0][5] = new bishop();
        $this->block[0][5]->color = "black";
        $this->block[0][5]->positin = new position();
        $this->block[0][5]->positin->x = 0;
        $this->block[0][5]->positin->y = 5;


        $this->block[0][3] = new qeen();
        $this->block[0][3]->color = "black";
        $this->block[0][3]->positin = new position();
        $this->block[0][3]->positin->x = 0;
        $this->block[0][3]->positin->y = 3;

        $this->block[0][4] = new king();
        $this->block[0][4]->color = "black";
        $this->block[0][4]->positin = new position();
        $this->block[0][4]->positin->x = 0;
        $this->block[0][4]->positin->y = 4;


//      var_dump($this->block[0][0]);
        for ($i = 0; $i < 8; $i++)
        {
            $this->block[1][$i] = new pawn();
            $this->block[1][$i]->color = "black";

            $this->block[1][$i]->positin = new position();
            $this->block[1][$i]->positin->x = 1;
            $this->block[1][$i]->positin->y = $i;
            //        var_dump($this->block[1][$i]);
            //
        }
/*
              for ($i=2;$i<8;$i++)
              for($j=0;$j<8;$j++)
              {
                  $this->block[$i][$j]=null;
                  $this->block[$i][$j]->positin=new position();
                  $this->block[$i][$j]->positin->x=$i;
                  $this->block[$i][$j]->positin->y=$j;
                  $this->block[$i][$j]->color="black";

                  $this->block[$i][$j]->positin=new position();
                  $this->block[$i][$j]->positin->x=1;
                  $this->block[$i][$j]->positin->y=$i;
        //        var_dump($this->block[1][$i]);
        //
              }*/

//var_dump($this->block);
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
        echo "rook move";
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
        if($this->Is_valid_move($pos)==0)
        {
            echo "move is done";
        }

    }

        public function Is_valid_move(position $pos)
    {
        // TODO: Implement move() method.

        var_dump($pos);
      echo  $rdiff=$this->position->x-$pos->x;
      echo  $hdiff=$this->position->y-$pos->y;
        if($hdiff==0)
        if($this->position->x==2)
        {
         //can move 2 row
            if($rdiff<3 && $rdiff>0)
                return 0;
        }
        else
        {
            //can move 1 row
            if($rdiff=1)
                return 0;

        }
        else return -1;

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
$game->board->block[01][0]->move($game->board->block[2][0]->position);