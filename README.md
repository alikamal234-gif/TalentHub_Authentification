# TalentHub – Authentification Multi-Rôles en PHP Natif (MVC)

## 📌 Présentation du projet

**TalentHub** est une plateforme de recrutement en cours de développement visant à connecter candidats et recruteurs de manière simple et efficace.

Ce dépôt contient le **socle technique d’authentification multi-rôles**, développé en **PHP natif**, sans framework, selon une **architecture MVC (Model-View-Controller)**.

L’objectif de ce projet est de fournir une base **propre, claire, sécurisée et extensible**, destinée à accueillir par la suite les fonctionnalités métier de la plateforme (offres d’emploi, candidatures, messagerie, etc.).

---

## 🎯 Objectif principal

👉 Mettre en place un système d’authentification multi-rôles réutilisable, respectant une architecture MVC stricte, servant de fondation à tout futur développement.

---

## 🧠 Objectifs pédagogiques

À l’issue de ce projet, vous serez capable de :

* Implémenter une architecture MVC “fait maison”
* Mettre en place un routage centralisé
* Séparer clairement :

  * La logique métier (**Models**)
  * Le contrôle des requêtes (**Controllers**)
  * L’affichage (**Views**)
* Gérer une authentification multi-rôles
* Protéger les routes selon le rôle utilisateur
* Comparer les avantages du MVC face à une approche procédurale
  *(maintenabilité, testabilité, évolutivité)*

---

## 🧱 Architecture du projet

```
TalentHub_Authentification/
├── public/
│   └── index.php                    # Point d'entrée unique
│
├── src/
│   ├── Controllers/
│   │   ├── AuthController.php       # Gestion inscription/connexion
│   │   ├── CandidateController.php  # Dashboard candidat
│   │   ├── RecruiterController.php  # Dashboard recruteur
│   │   └── AdminController.php      # Dashboard admin
│   │
│   ├── Services/
│   │   └── AuthService.php          # Logique métier auth
│   │
│   ├── Models/
│   │   ├── User.php                 # Entité User
│   │   └── Role.php                 # Entité Role
│   │
│   ├── Repositories/
│   │   ├── UserRepository.php       # Persistence User
│   │   └── RoleRepository.php       # Persistence Role
│   │
│   ├── Views/
│   │   ├── auth/
│   │   │   ├── login.php
│   │   │   └── register.php
│   │   ├── candidate/
│   │   │   └── dashboard.php
│   │   ├── recruiter/
│   │   │   └── dashboard.php
│   │   ├── admin/
│   │   │   └── dashboard.php
│   │   └── errors/
│   │       └── 403.php
│   │
│   ├── Router.php                   # Gestion des routes
│   └── Database.php                 # Connexion PDO
│
├── config/
│   └── database.php                 # Configuration BDD
│
├── sql/
│   └── schema.sql                   # Script de création des tables
│
└── README.md
```

### 🔁 Flux de requête

```
index.php → Router → Controller → Model (si nécessaire) → View
```

⚠️ Aucun accès direct aux fichiers internes n’est autorisé.

---

## 👥 Rôles du système

### 👤 Candidate

* Inscription
* Connexion
* Accès au dashboard candidat

### 🏢 Recruiter

* Inscription
* Connexion
* Accès au dashboard recruteur

### 🛡️ Admin

* Connexion uniquement (pas d’inscription publique)
* Accès au back-office admin
* Aucune vue partagée avec les autres rôles

📌 Chaque rôle possède :

* Ses propres routes (`/candidate/*`, `/recruiter/*`, `/admin/*`)
* Ses propres contrôleurs
* Ses propres vues protégées

---

## ⚙️ Fonctionnalités implémentées

### 🔐 Authentification

* Inscription (Candidate & Recruiter)
* Sélection du rôle à l’inscription
* Validation des données utilisateur
* Connexion multi-rôles
* Création et destruction de session
* Hashage sécurisé des mots de passe (`password_hash()`)

### 🔑 Gestion des rôles

* Attribution automatique du rôle
* Stockage du rôle en session
* Redirection post-login :

  ```
  /{role}/dashboard
  ```

### 🚫 Protection des routes

* Routes publiques :

  * `/`
  * `/register`
  * `/login`
* Routes protégées :

  * `/candidate/*`
  * `/recruiter/*`
  * `/admin/*`

Vérifications systématiques :

* Utilisateur connecté
* Rôle autorisé

---

## 🔐 Sécurité

### Obligatoire

* Hashage des mots de passe
* Sessions PHP sécurisées
* Requêtes PDO préparées
* Validation des entrées utilisateur
* Messages d’erreur non sensibles

### Interdit

* Mots de passe en clair
* Rôles hardcodés
* Accès direct aux fichiers
* SQL dans les contrôleurs
* Code procédural dans les contrôleurs

---

## 🧩 UML (obligatoire)

### 1️⃣ Diagramme de cas d’utilisation

* Inscription (Candidate, Recruiter)
* Connexion (tous les rôles)
* Accès dashboard selon rôle
* Déconnexion

### 2️⃣ Diagramme de classes

**User**

* id
* name
* email
* password
* role_id
* `authenticate()`
* `hasRole()`

**Role**

* id
* name

Relation :
`User → Role (Many-to-One)`

---

## 🎁 Bonus (optionnel)

* Remember Me (cookie sécurisé)
* Logger des tentatives de connexion
* Validation JS côté client
* Page 404 personnalisée

---

## 🏁 Résultat attendu

À la fin du projet, vous devez être capable de :

* Expliquer et justifier l’architecture MVC
* Ajouter un nouveau rôle sans casser l’existant
* Démontrer la supériorité du MVC sur le procédural
* Réutiliser ce système d’authentification dans tout projet PHP futur

---

## 🧑‍💻 Auteur

Projet réalisé dans un cadre pédagogique – TalentHub
PHP Natif • MVC • Sécurité • Clean Architecture
