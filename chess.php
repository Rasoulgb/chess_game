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
}
 abstract class piece
{
     public $color;
     public position $position;
     abstract function move(position $pos);
}
 class game
{
  public $turn="whitetoken";
  public piece[] $board;
}

class rook extends piece
{
    public function move(position $pos)
    {

    }
}
$game=new game();
