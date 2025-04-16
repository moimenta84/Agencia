# 🌐 Proyecto AGENCIA

> Proyecto web desarrollado en **PHP + PostgreSQL**  
> Estructura modular + control de versiones con Git  


---

## 📁 Estructura del proyecto

```
AGENCIA/
├── Assets/               → CSS, imágenes, JS
├── Includes/             → Archivos PHP reutilizables
│   ├── header.php
│   ├── footer.php
│   ├── section.php
│   └── conexion.php
├── index.php             → Página principal
├── .gitignore            → Archivos ignorados por Git
└── README.md             → Este documento
```

---

## 🚀 Flujo de trabajo con Git

### 🔀 Ramas del proyecto

- `master` → Código estable y probado (💡 solo el Git Master lo toca)
- `develop` → Rama de desarrollo compartida (todos trabajan aquí)
- `feature/*` → Funcionalidades nuevas (una rama por tarea)

---

## 🛠️ ¿Cómo trabajar en este proyecto?

### 1️⃣ Crea una nueva rama desde `develop`

```bash
git checkout develop
git checkout -b feature/nombre-de-tu-tarea
```

Ejemplo:

```bash
git checkout -b feature/conexion-base-datos
```

---

### 2️⃣ Guarda y sube tus cambios

```bash
git add .
git commit -m "💻 Mensaje claro sobre lo que hiciste"
git push -u origin feature/nombre-de-tu-tarea
```

---

### 3️⃣ Cuando termines tu tarea, haz merge a `develop`

```bash
git checkout develop
git merge feature/nombre-de-tu-tarea
git push origin develop
```

---

### 4️⃣ Borra tu rama (opcional pero recomendable)

```bash
git branch -d feature/nombre-de-tu-tarea
git push origin --delete feature/nombre-de-tu-tarea
```

---

### 5️⃣ El Git Master hace merge final a `master`

(Solo cuando todo está probado)

```bash
git checkout master
git merge develop
git push origin master
```

---

## ✅ Estado actual del proyecto

- [x] Estructura base creada
- [x] Rama develop creada
- [ ] Conexión con la base de datos
- [ ] Funcionalidades dinámicas (platos, pedidos…)
- [ ] Proyecto finalizado

---

## 📌 Reglas de oro

- 🔸 No se trabaja nunca en `master`
- 🔸 Siempre usar ramas `feature/` para cosas nuevas
- 🔸 Hacer commits claros y constantes
- 🔸 Leer este README antes de tocar nada 😄
- 🔸 Pregunta a **Iker (Git Master)** si tienes dudas

---

> DAW – Proyecto intramodular  
> Git Master y coordinador de ramas
