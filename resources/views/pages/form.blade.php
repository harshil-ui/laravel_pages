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
            @php
                $hobbies = json_decode($page['hobbies']);
            @endphp
            <label for="hobbies">hobbies :
                <input type="checkbox" name="hobbies[]" value="eating"
                    {{ isset($page) && in_array('eating', $hobbies) ? 'checked' : '' }}> Eating
                <input type="checkbox" name="hobbies[]" value="drinking"
                    {{ isset($page) && in_array('drinking', $hobbies) ? 'checked' : '' }}> Drinking
                <input type="checkbox" name="hobbies[]" value="drawing"
                    {{ isset($page) && in_array('drawing', $hobbies) ? 'checked' : '' }}> drawing
            </label>
        </div>

        <input type="submit" value="{{ isset($page) ? 'Update' : 'Add' }}">
    </form>

    <a href="{{ route('home') }}">Back</a>
@endsection
