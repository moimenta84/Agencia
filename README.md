# 🌐 Proyecto AGENCIA

> Proyecto web desarrollado en **PHP + PostgreSQL**  
> Estructura modular + control de versiones con Git  
> Desarrollado por : Iker Matínez Velasco, José Luis Sánchez Hernández, Skarlet Brizuela Molina


👥 Roles del Equipo
🧑‍💻 GitMaster – Iker
Encargado de que todo lo que se suba a Git funcione correctamente. Responsable de resolver conflictos, mantener el flujo de trabajo en Git y añadir al profesor de EDD como colaborador del proyecto.

📊 Project Manager – Skarlet
Gestiona el proyecto utilizando la herramienta ProjectLibre, asignando recursos, costes y tiempos. Controla las desviaciones del proyecto respecto a la planificación inicial.

🧾 Encargado de Maquetación – Jose Luis
Se encarga de que toda la documentación generada tenga un formato adecuado y esté unificada. Será quien dé el formato final a la memoria.

👔 CEO – Jose Luis

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
- [ ] Funcionalidades dinámicas 
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
