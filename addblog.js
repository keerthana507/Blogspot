document.getElementById('blogForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const title = document.getElementById('title').value;
    const content = document.getElementById('content').value;

    // Initialize Firebase
    const firebaseConfig = {
        apiKey: "YOUR_API_KEY",
        authDomain: "YOUR_AUTH_DOMAIN",
        projectId: "YOUR_PROJECT_ID",
        storageBucket: "YOUR_STORAGE_BUCKET",
        messagingSenderId: "YOUR_MESSAGING_SENDER_ID",
        appId: "YOUR_APP_ID"
    };
    
    firebase.initializeApp(firebaseConfig);

    // Get a reference to the database service
    const database = firebase.database();

    // Push blog data to the database
    database.ref('blogs').push({
        title: title,
        content: content
    })
    .then(() => {
        document.getElementById('successMessage').textContent = 'Blog added successfully!';
    })
    .catch(error => console.error('Error:', error));
});
