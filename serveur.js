const express = require('express');
const axios = require('axios');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

// Remplacez par votre clé API OpenAI
const OPENAI_API_KEY = 'votre_clé_api';

app.use(bodyParser.json());
app.use(express.static('public'));

// Endpoint pour envoyer des messages au modèle GPT
app.post('/chat', async (req, res) => {
  const userMessage = req.body.message;

  try {
    const response = await axios.post(
      'https://api.openai.com/v1/completions',
      {
        model: 'gpt-4',  // Ou 'gpt-3.5-turbo' selon votre choix
        prompt: userMessage,
        max_tokens: 150,
        temperature: 0.9
      },
      {
        headers: {
          'Authorization': `Bearer ${OPENAI_API_KEY}`,
          'Content-Type': 'application/json'
        }
      }
    );

    const botResponse = response.data.choices[0].text.trim();
    res.json({ reply: botResponse });
  } catch (error) {
    console.error('Error contacting OpenAI:', error);
    res.status(500).send('Erreur du serveur');
  }
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:8080`);
});
