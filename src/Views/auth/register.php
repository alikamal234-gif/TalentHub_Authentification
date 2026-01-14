<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Register | TalentHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-900 flex items-center justify-center text-slate-100">

<div class="w-full max-w-lg bg-slate-800/70 backdrop-blur rounded-2xl shadow-2xl p-8 border border-slate-700">

    <div class="flex justify-center mb-6">
        <div class="flex items-center gap-3">
            <svg width="36" height="36" viewBox="0 0 100 100" fill="none">
                <rect width="100" height="100" rx="20" fill="url(#grad)"/>
                <path d="M30 65V35H45V65H30ZM55 35H70V65H55V35Z" fill="white"/>
                <defs>
                    <linearGradient id="grad" x1="0" y1="0" x2="100" y2="100">
                        <stop stop-color="#6366F1"/>
                        <stop offset="1" stop-color="#8B5CF6"/>
                    </linearGradient>
                </defs>
            </svg>
            <span class="text-xl font-bold">TalentHub</span>
        </div>
    </div>

    <h1 class="text-center text-lg font-semibold mb-6">
        Créer un compte
    </h1>

    <form method="POST" action="/register" class="space-y-5">

        <input type="text" name="name" placeholder="Nom complet" required
            class="w-full px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg focus:ring-2 focus:ring-indigo-500">

        <input type="email" name="email" placeholder="Email" required
            class="w-full px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg focus:ring-2 focus:ring-indigo-500">

        <input type="password" name="password" placeholder="Mot de passe" required minlength="8"
            class="w-full px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg focus:ring-2 focus:ring-indigo-500">

        <input type="password" name="password_confirm" placeholder="Confirmer mot de passe" required
            class="w-full px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg focus:ring-2 focus:ring-indigo-500">

        <div class="flex gap-6 justify-center text-sm">
            <label class="flex items-center gap-2">
                <input type="radio" name="role" value="candidate" required class="accent-indigo-500">
                Candidat
            </label>
            <label class="flex items-center gap-2">
                <input type="radio" name="role" value="recruiter" class="accent-indigo-500">
                Recruteur
            </label>
        </div>

        <button
            type="submit"
            class="w-full bg-gradient-to-r from-indigo-500 to-violet-600 py-2 rounded-lg font-semibold hover:opacity-90"
        >
            S'inscrire
        </button>

    </form>

    <p class="text-center text-sm text-slate-400 mt-6">
        Déjà un compte ?
        <a href="/login" class="text-indigo-400 hover:underline">Connexion</a>
    </p>
</div>

</body>
</html>
