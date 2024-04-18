<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    protected $document;

    public function __construct()
    {
        $this->document = new Document();
    }

    public function index()
    {
        return $this->document->all();
    }

    public function store(Request $request)
    {
        return $this->document->create($request->all());
    }

    public function show(string $id)
    {
        return $this->document->find($id);
    }

    public function update(Request $request, string $id)
    {
        $document = $this->document->find($id);
        $document->update($request->all());
        return $document;
    }

    public function destroy(string $id)
    {
        $document = $this->document->find($id);
        return $document->delete();
    }
}
