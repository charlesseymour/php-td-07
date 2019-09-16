<?php
// Routes

$app->get('/api/v1/todos', function ($request, $response, $args) {
   $result = $this->task->getTasks();
   return $response->withJson($result, 200, JSON_PRETTY_PRINT);
});

$app->get('/api/v1/todos/{id}', function ($request, $response, $args){
	$result = $this->task->getTask($args['id']);
	return $response->withJson($result, 200, JSON_PRETTY_PRINT);
});

$app->post('/api/v1/todos', function ($request, $response, $args) {
	$result = $this->task->createTask($request->getParsedBody());
	return $response->withJson($result, 201, JSON_PRETTY_PRINT);
});

$app->put('/api/v1/todos/{id}', function ($request, $response, $args) {
	$data = $request->getParsedBody();
	$data['task_id'] = $args['id'];
	$result = $this->task->updateTask($data);
	return $response->withJson($result, 201, JSON_PRETTY_PRINT);
});

$app->delete('/api/v1/todos/{id}', function ($request, $response, $args) {
	$this->task->deleteTask($args['id']);
	
});