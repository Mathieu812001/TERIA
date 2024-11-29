import speech_recognition as sr
from transformers import pipeline
from sumy.parsers.plaintext import PlaintextParser
from sumy.nlp.tokenizers import Tokenizer
from sumy.summarizers.lsa import LsaSummarizer

# Étape 1 : Transcription de l'audio en texte
def transcribe_audio(file_path):
    recognizer = sr.Recognizer()
    audio_file = sr.AudioFile(file_path)

    with audio_file as source:
        audio_data = recognizer.record(source)
        print("Transcription en cours...")
        try:
            text = recognizer.recognize_google(audio_data, language="fr-FR")
            return text
        except sr.UnknownValueError:
            return "Impossible de transcrire l'audio."
        except sr.RequestError:
            return "Erreur avec le service de transcription."

# Étape 2 : Résumer le texte
def summarize_text_with_transformers(text):
    print("Résumé en cours avec Transformers...")
    summarizer = pipeline("summarization", model="facebook/bart-large-cnn")
    summary = summarizer(text, max_length=130, min_length=30, do_sample=False)
    return summary[0]['summary_text']

def summarize_text_with_sumy(text):
    print("Résumé en cours avec Sumy...")
    parser = PlaintextParser.from_string(text, Tokenizer("french"))
    summarizer = LsaSummarizer()
    summary = summarizer(parser.document, 3)  # Résumé avec 3 phrases
    return " ".join(str(sentence) for sentence in summary)

# Étape 3 : Intégration
if __name__ == "__main__":
    # Chemin du fichier audio (format WAV recommandé)
    audio_file_path = "reunion.wav"  # Remplacez par votre fichier audio

    # Transcrire l'audio
    transcript = transcribe_audio(audio_file_path)
    print("\nTexte transcrit :\n", transcript)

    if transcript:
        # Générer un résumé avec Transformers
        summary_transformers = summarize_text_with_transformers(transcript)
        print("\nRésumé (Transformers) :\n", summary_transformers)

        # Générer un résumé avec Sumy
        summary_sumy = summarize_text_with_sumy(transcript)
        print("\nRésumé (Sumy) :\n", summary_sumy)
