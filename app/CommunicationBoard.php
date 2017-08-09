<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CommunicationBoard extends Model
{
    // @param $blogId (DataType : INT)
    public function allBoardD($id) 
    {
        $blogId = $id;
        $boardData = DB::table('communication_boards')
            ->join('communication_relations', 'communication_boards.id', '=', 'communication_relations.board_id')
            ->join('blog_communication_relations', 'communication_relations.communication_id', '=', 'blog_communication_relations.communication_id')
            ->select('blog_communication_relations.blog_id', 'communication_boards.title', 'communication_boards.writer_name', 'communication_boards.created_at')
            ->where('blog_communication_relations.blog_id', '=', $blogId)
            ->get();


        return $boardData;
    }
}
