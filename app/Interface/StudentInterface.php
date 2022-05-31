<?php

namespace App\Interface;

interface StudentInterface
{
    public function index();

    public function indexAPI();

    public function create();

    public function store($request);

    public function show($id);

    public function edit($id);

    public function update($id, $request);

    public function destroy($id);
}
