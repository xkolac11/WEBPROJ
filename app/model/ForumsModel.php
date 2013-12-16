<?php


class ForumsModel Extends BaseModel{
	
	public function getForumsBySectionId($id){
	
		return dibi::query('SELECT forums.id AS f_id, forums.title AS title, forums.description AS description,
							forums.datetime AS forum_datetime,
							
								-- topics count
								(SELECT COUNT(topics.id) FROM topics
								WHERE topics.forums_id = f_id) AS topics_count,
								
								-- posts count
								(SELECT COUNT(posts.id) FROM posts, topics
								WHERE posts.topics_id = topics.id
									AND topics.forums_id = f_id) AS posts_count,
									
								-- last post - user
								(SELECT users.login 
								FROM posts, topics, users						
								WHERE posts.topics_id = topics.id
									AND topics.forums_id = f_id
									AND users.id = posts.users_id
									AND posts.id = (SELECT MAX(id) FROM posts)
									) as last_user,

								-- last post - topic
								(SELECT  topics.name 
								FROM posts, topics, users						
								WHERE posts.topics_id = topics.id
									AND topics.forums_id = f_id
									AND users.id = posts.users_id
									AND posts.id = (SELECT MAX(id) FROM posts)
									) as last_topic,
									
								-- last post - datetime
								(SELECT  posts.datetime 
								FROM posts, topics, users						
								WHERE posts.topics_id = topics.id
									AND topics.forums_id = f_id
									AND users.id = posts.users_id
									AND posts.id = (SELECT MAX(id) FROM posts)
									) as last_datetime
									
							
							FROM forums
							WHERE sections_id = %i
							', $id)->fetchAll();
	}
	
	public function getById($id){
		return dibi::query('SELECT * FROM forums WHERE id=%i',$id)->fetch();
	}
	
	public function getForumSection($id){
		return dibi::query('SELECT sections.title, sections.id FROM sections INNER JOIN forums ON forums.sections_id = sections.id WHERE forums.id=%i', $id)->fetch();
	}
	
}