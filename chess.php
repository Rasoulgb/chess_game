<?php
class block
{
    public $x;
    public $y;
    public $color;
    public piece $piece;
    public function setpiece(piece $p)
    {
        $this->piece=$p;
    }
    public function getpiece()
    {
        return $this->piece;
    }

}
class player

{
    public $color;
    public $player_name;
    function movie(piece $pi ,block $pos)
    {

    }
}
 abstract class piece
{
     public $color;
     public $name;
     //public position $position;
     abstract function move(block $block);
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
                if ((isset(($this->block[$row][$h]->piece))))
                    echo "\e[0;30;43m" . $this->block[$row][$h]->piece->name . "\e[0m";
                else
                    echo $this->block[$row][$h]->color;
            }
            echo "\n";
        }
    }

    public  function initblock()
    {
        $cell=0;
       for($r=0;$r<8;$r++)
       {
           for($h=0;$h<8;$h++)
           {
               if($cell%2==0)
                   $color="w";
               else
                   $color="b";
               $this->block[$r][$h] = new block();
               $this->block[$r][$h]->color = $color;
               $this->block[$r][$h]->x=$r;
               $this->block[$r][$h]->y=$h;
               $cell++;
        //       echo "block $r,$h is $color ";
           }
           $cell++;
          // echo "\n";


       }

    }

    public function initpiece()
    {
        //$board=new board();
        //$this->piece[0][0]=[];
        $this->block[0][0]->piece=  new rook();
        $this->block[0][0]->piece->color = "black";

        $this->block[0][7]->piece = new rook();
        $this->block[0][7]->piece->color = "black";

        $this->block[0][1]->piece = new knight();
        $this->block[0][1]->piece->color = "black";

        $this->block[0][6]->piece = new knight();
        $this->block[0][6]->piece->color = "black";

        $this->block[0][2]->piece = new bishop();
        $this->block[0][2]->piece->color = "black";

        $this->block[0][5]->piece = new bishop();
        $this->block[0][5]->piece->color = "black";

        $this->block[0][3]->piece = new qeen();
        $this->block[0][3]->piece->color = "black";

        $this->block[0][4]->piece = new king();
        $this->block[0][4]->piece->color = "black";

//      var_dump($this->block[0][0]);
        for ($i = 0; $i < 8; $i++)
        {
            $this->block[1][$i]->piece = new pawn();
            $this->block[1][$i]->piece->color = "black";
            //        var_dump($this->block[1][$i]);
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
      $this->board->initblock();
      $this->board->initpiece();
      $this->board->show_board();
  }
}

class rook extends piece
{
    public $name="R";

    public function move(block $pos)
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
    public function move(block $block)
    {
        if($this->Is_valid_move($block)==0)
        {
            echo "move is done";
        }

    }

    public function Is_valid_move(block $pos)
    {
        // TODO: Implement move() method.

        var_dump($pos);
      echo  $rdiff=$this->block->x-$pos->x;
      echo  $hdiff=$this->block->y-$pos->y;
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
    public function move(block $pos)
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
    public function move(block $pos)
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
    public function move(block $pos)
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
    public function move(block $pos)
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
//$game->board->show_board();
$game->board->block[01][0]->piece->move($game->board->block[2][0]);