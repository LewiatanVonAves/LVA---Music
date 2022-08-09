<?php

class home extends Dbh
{
    protected $content = "";

    protected function showPlaylist($userid, $username)
    {
        $stmt = $this->dbConnect()->prepare("SELECT `user`.`id`, `user`.`username`, `playlist`.`title`, `playlist`.`icon`, `playlist`.`id` as 'playlist_id' 
        FROM `lva`.`user` 
        INNER JOIN `lva`.`uspl_create` ON `user`.`id` = `uspl_create`.`id_user` 
        INNER JOIN `lva`.`playlist` ON `uspl_create`.`id_playlist` = `playlist`.`id` 
        WHERE`user`.`id` = ?");

        if(!$stmt->execute(array($userid)))
        {
            $stmt = null;
            exit();
        }

        $content = "";

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $content = $content."<table><tr><td><h3>".$row['title']."</h3></td></tr>";

            $stmt2 = $this->dbConnect()->prepare("SELECT `playlist`.`id` as playlist_id, `song`.`title`, `song`.`src`, `song`.`icon`, `user`.`username`
            FROM `lva`.`playlist`
            INNER JOIN `lva`.`plso` ON `plso`.`id_playlist` = `playlist`.`id`
            INNER JOIN `lva`.`song` ON `song`.`id` = `plso`.`id_song`
            INNER JOIN `lva`.`user` ON `user`.`id` = `song`.`id_author`
            WHERE `playlist`.`id` = ?");

            $playlistid = 1;
            if(!$stmt->execute(array($playlistid)))
            {
                $stmt = null;
                exit();
            }
            // ??
            while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
            {
                $content = $content. "<tr><td><h4>".$row2['title']."</h4></td><td><h5>".$row['username']."</h5></td></tr>";
                
            }
            $content = $content."</table>";
        }
        
        return $content;
    }
}