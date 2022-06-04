<?php
class position
{
    public $x=0;
    public $y=0;
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
     public board $board;
     abstract function move(position $pos);
     abstract function am_i_cheched();
}

class board
{
  public piece $piece;
}
 class game
{
  public $turn="whitetoken";

}

class rook extends piece
{
    public function move(position $pos)
    {

    }
    public function am_i_cheched()
    {
        // TODO: Implement am_i_cheched() method.

    }

}
$game=new game();
