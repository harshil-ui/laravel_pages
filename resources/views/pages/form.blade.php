@extends('layouts.app')

@section('title', 'Create Page')

@section('content')

    <h2>Create Pages</h2>

    <form action="{{ isset($page) ? route('page-update', $page->id) : route('post-page') }}" method="post">
        @csrf
        <div>
            <label for="name">Name : </label>
            <input type="text" name="name" id="name" value="{{ isset($page) ? $page->name : '' }}" required>
        </div>

        <div>
            <label for="slug">Slug : </label>
            <input type="text" name="slug" id="slug" value="{{ isset($page) ? $page->slug : '' }}" required>
        </div>

        <div>
            <label for="editor">Editor : </label>
            <input type="text" name="editor" id="editor" value="{{ isset($page) ? $page->editor : '' }}" required>
        </div>

        <div>
            <label for="hobbies">hobbies : </label>
            <input type="checkbox" name="hobbies" value="eating" id=""> Eating
            <input type="checkbox" name="hobbies" value="drinking" id=""> Drinking
            <input type="checkbox" name="hobbies" value="drying"> Drying
        </div>

        <input type="submit" value="{{ isset($page) ? 'Update' : 'Add' }}">
    </form>

    <a href="{{ route('home') }}">Back</a>
@endsection
