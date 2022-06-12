<?php
class block
{
    public $x;
    public $y;
    public $color;
    public $isfill=0;
    public piece $piece;
    public function setpiece(piece $p)
    {
        $this->piece=$p;
        $this->isfill=1;
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
     public $position;
     public $iskilled=0;
     abstract function move(block $block,board $board);
     abstract function am_i_cheched();
}

class board
{
    public array $block = [];

    public function show_board()
    {
        for ($r = 0; $r < 8; $r++)
        {
            $bgc = 0;
            $fgc = 0;
            for ($c = 0; $c < 8; $c++)
            {
                if ((isset(($this->block[$r][$c]->piece))))
                    echo "\e[0;30;43m" . $this->block[$r][$c]->piece->name . "\e[0m";
                else
                    echo $this->block[$r][$c]->color;
            }
            echo "\n";
        }
    }

    public  function initblock()
    {
        $cell=0;
       for($r=0;$r<8;$r++)
       {
           for($c=0;$c<8;$c++)
           {
               if($cell%2==0)
                   $color="w";
               else
                   $color="b";
               $this->block[$r][$c] = new block();
               $this->block[$r][$c]->color = $color;
               $this->block[$r][$c]->x=$r;
               $this->block[$r][$c]->y=$c;

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
      /*  $this->block[0][0]->piece=  new rook();
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
        $this->block[0][4]->piece->color = "black";*/

//      var_dump($this->block[0][0]);
        for ($i = 0; $i < 8; $i++)
        {
            $this->block[1][$i]->piece = new pawn();
            $this->block[1][$i]->piece->color = "black";
            $this->block[1][$i]->piece->position['r'] =1 ;
            $this->block[1][$i]->piece->position['c'] =$i ;
            $this->block[1][$i]->isfill=1;
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

class pawn extends piece
{
    public $name="P";
    public function move(block $block,board $board)
    {
        echo $isvalidmove=$this->Is_valid_move($block,$board);
        if ($isvalidmove==0 or $isvalidmove==2)
        {
            echo $isvalidmove;

            switch ($res=$this->is_valid_block($block, $isvalidmove))

            {
            case -1:

                echo "block not valid.filled by enemy";
                return -1;

            case 1:
                echo "valid block and must be move-----$res";
                $this->position['r']=$board->block[$block->x];
                $this->position['c']=$board->block[$block->y];
                $board->block[$block->x][$block->y]->setpiece($this);

                break;

            case 2:
                echo "valid block and must be kill enemy";
                //call kill

            }

        }

    }
public function is_valid_block(block $block,$isvalidmove)
{
    if(($isvalidmove==1 or $isvalidmove==2)   and $block->isfill==1)

    {
        echo "enemy-but cant kill";
        return -1; //not valid block
    }

    if ($isvalidmove==3 and $block->isfill==1 and $block->piece->color!=$this->color)
    {
        echo "enemy and must kill";
        return 2;
    }
    echo "valid block ";
    return 1;
}
    public function Is_valid_move(block $block,board $board)
    {
        // TODO: Implement move() method.

        $validmove=0;
        $rdiff=$this->position['r']-$block->x;
        if ($this->color=='black') $rdiff=-1*$rdiff;

         $cdiff=$this->position['c']-$block->y;

        if($cdiff==0)//حرکت مستقیم است
        if($this->position['r']==1)//اگر در خانه شروع بود
        {

            if($rdiff==1)
            {
                echo "can move 2 block but move 1 block forward";
                $validmove=1;
                return 1;
            }
            if($rdiff==2 )
            {
                echo "can  move 2 block && move 2 block forward";

                if($board->block[$this->position['r']+1][$block->y]->isfill==1)
                {
                    echo "block is fill- move is not valid";
                    $validmove=-1;
                    return -1;
                }
                $validmove=2;
                return 2;
            }
        }
        else
        {
            //can move 1 row
            if($rdiff==1 )
            {
                echo "only can move 1 block and now move 1 block forward";
                $validmove=1;
                return 1;
            }

        }
        else

        {
            if (($cdiff==1 or $cdiff==-1) and ($rdiff==1))
            {
                echo "move for kill";
                $validmove=3;
                return 3;

            }

        }
    if($validmove==0)
        {
            echo "move is not valid last";
            return -1;
        }

    }




    public function am_i_cheched()
    {
        // TODO: Implement am_i_cheched() method.
    }

}


/*

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

*/



$game=new game();
$game->run();
//$game->board->show_board();
$game->board->block[01][2]->piece->move($game->board->block[3][2],$game->board);