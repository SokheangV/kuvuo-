@extends('layouts.admin')

@section('title', 'KUVUO CMS Login')
@section('cms_content')
<style>
    .alogin-page,
    .alogin-page * { box-sizing: border-box; }
    .alogin-page {
        --green: #12372A;
        --green-mid: #1F5D45;
        --soft: #F6FAF7;
        --border: #D7DED9;
        --text: #111827;
        --muted: #6B7280;
        color: var(--text);
        font-family: 'Nunito', Arial, sans-serif;
    }
    .alogin-card {
        width: min(100%, 460px);
        background: #fff;
        border: 1px solid var(--border);
        box-shadow: 0 28px 56px -34px rgba(18, 55, 42, 0.24);
        padding: 32px 28px;
    }
    .alogin-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 6px 10px; border: 1px solid var(--green); color: var(--green);
        font-size: 11px; font-weight: 800; letter-spacing: 0.16em; text-transform: uppercase;
    }
    .alogin-eyebrow::before {
        content: ""; width: 6px; height: 6px; background: #D97706; display: block;
    }
    .alogin-card h1 {
        margin: 18px 0 12px;
        font-family: 'Science Gothic', Arial, sans-serif;
        font-size: clamp(28px, 3vw, 38px);
        line-height: 1.08;
    }
    .alogin-card p {
        margin: 0 0 22px;
        color: var(--muted);
        line-height: 1.7;
    }
    .alogin-flash,
    .alogin-errors {
        margin-bottom: 18px;
        padding: 14px 16px;
        border: 1px solid var(--border);
    }
    .alogin-flash {
        background: var(--soft);
        color: var(--green);
        font-weight: 700;
    }
    .alogin-errors {
        background: #FFF1F2;
        color: #991B1B;
        border-color: rgba(185, 28, 28, 0.2);
    }
    .alogin-field { display: grid; gap: 8px; margin-bottom: 16px; }
    .alogin-field label {
        color: var(--text);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }
    .alogin-field input {
        width: 100%;
        padding: 14px 16px;
        border: 1px solid var(--border);
        background: #fff;
        color: var(--text);
        font: inherit;
        outline: none;
    }
    .alogin-field input:focus {
        border-color: var(--green);
        box-shadow: 0 0 0 4px rgba(18, 55, 42, 0.08);
    }
    .alogin-remember {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 4px 0 20px;
        color: var(--text);
        font-weight: 700;
    }
    .alogin-remember input { width: 18px; height: 18px; }
    .alogin-btn {
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 14px 22px;
        border: 1px solid var(--green);
        background: var(--green);
        color: #fff;
        font: inherit;
        font-weight: 700;
        cursor: pointer;
    }
    .alogin-btn:hover {
        background: var(--green-mid);
        border-color: var(--green-mid);
    }
    .alogin-help {
        margin-top: 16px;
        color: var(--muted);
        font-size: 13px;
        line-height: 1.6;
    }
</style>

<div class="alogin-page">
    <div class="alogin-card">
        <span class="alogin-eyebrow">Admin Access</span>
        <h1>Sign in to manage blog posts.</h1>
        <p>Only authenticated admins can create, edit, publish, or delete blog posts.</p>

        @if (session('success'))
            <div class="alogin-flash">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alogin-errors">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf

            <div class="alogin-field">
                <label for="admin-email">Email</label>
                <input id="admin-email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="alogin-field">
                <label for="admin-password">Password</label>
                <input id="admin-password" type="password" name="password" required>
            </div>

            <label class="alogin-remember">
                <input type="checkbox" name="remember" value="1">
                Remember me
            </label>

            <button type="submit" class="alogin-btn">Sign In</button>
        </form>

        <p class="alogin-help">Current seeded admin account: <strong>test@example.com</strong> with password <strong>password</strong>.</p>
    </div>
</div>
@endsection
