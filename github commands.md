# GitHub Guide

## Install GitHub CLI

**On Windows terminal(CMD) run this code to install github CLI:**

```bash
winget install --id GitHub.cli
````

---
### Open Git Bash to run this commands OR Via VS Code if you have bash on VS Code
## Authenticate to GitHub

After installation, authenticate with your GitHub account by running:

```bash
gh auth login
```

### Confirm you are logged in

```bash
gh auth status
```

---

## Navigate to a Folder on Your PC

```bash
cd 'documents/InnovativeIT-RunMidrand'
```

### List files and folders in the current directory

```bash
git ls
```

---

## Upload Files or Folders to Git Repository (Main Branch)

> For admins who can directly commit without a pull request:

```bash
git add .
git commit -m "Added src, assets, and docs folders with .gitkeep files"
git push
```

---

## Working on a New Branch (e.g., `updated-homepage`)

*If your GitHub repository is already cloned locally and you want to upload changes to a new branch instead of main:*

### Steps:

1. **Create and switch to a new branch:**

```bash
git checkout -b updated-homepage
```

2. **Stage your changes** (stages all modified files):

```bash
git add .
```

> You can also stage specific files:

```bash
git add index.html style.css
```

3. **Commit your changes:**

```bash
git commit -m "Updated homepage layout and styles"
```

4. **Push your new branch to GitHub:**

```bash
git push origin updated-homepage
```

* `origin` → the remote repository on GitHub
* `updated-homepage` → the local branch you want to push

---

## Creating a Pull Request

You have two options to merge `updated-homepage` into `main`:

1. **On GitHub website:**
   Create a Pull Request from `updated-homepage` → `main`.
   *This allows you or others to review changes before merging.*

2. **Using GitHub CLI or locally:**

```bash
git checkout main
git merge updated-homepage
git push origin main
```

---

## Downloading a Repository from a Specific Branch

1. **Fetch all branches from GitHub:**

```bash
git fetch origin
```

> Updates your local repository with all branches from GitHub.
> It doesn’t change your working files yet; it just “sees” the remote branches.

2. **Check which branches are available:**

```bash
git branch -r
```

> Lists all remote branches, e.g.:
>
> ```
> origin/main
> origin/updated-homepage
> ```

3. **Create a local branch tracking the remote branch:**

```bash
git checkout -b updated-homepage origin/updated-homepage
```

* `-b updated-homepage` → creates a new local branch
* `origin/updated-homepage` → tracks the remote branch

Your local branch is now synced with GitHub’s `updated-homepage`.

4. **Optional: Verify current branch**

```bash
git branch
```

> Should show:
>
> ```
> * updated-homepage
>   main
> ```
>
> `*` indicates the branch you are currently on.

```

---

I can also make a **more visually appealing version with badges, colored notes, and sections highlighted** if you want this to feel like a proper GitHub Markdown tutorial page.  

Do you want me to do that?
```



