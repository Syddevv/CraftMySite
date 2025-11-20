// Gemini AI Logic with Knowledge Injection ---
const askAiBtn = document.getElementById('askAiBtn');
const aiQuestionInput = document.getElementById('aiQuestionInput');
const aiResponseContainer = document.getElementById('aiResponseContainer');
const aiLoader = document.getElementById('aiLoader');
const btnText = askAiBtn.querySelector('span');

// 3A. Gather FAQ content from the page
const faqItems = document.querySelectorAll('.faq-item');
let contextText =
    'You are a helpful support assistant for CraftMySite. Answer based on the following Knowledge Base:\n\n';

faqItems.forEach((item) => {
    const question = item.querySelector('button span').innerText;
    const answer = item.querySelector('.accordion-content p').innerText;
    contextText += `Q: ${question}\nA: ${answer}\n\n`;
});

contextText += `
      --- ADDITIONAL SYSTEM KNOWLEDGE ---
      
      OWNERS / TEAM:
      1. Sydney Santos: 
         - Co-Founder & 3rd Year BSIS Student.
         - Role: Full-stack developer specializing in MERN stack (MongoDB, Express, React, Node).
         - Skills: Combines front-end and back-end expertise with UI/UX design skills using Figma.
      
      2. James Camua:
         - Co-Founder & 3rd Year BSIS Student.
         - Role: Front-end developer.
         - Skills: Skilled in HTML and CSS, focused on creating clean, responsive, and visually appealing user interfaces.

      MISSION & VISION:
      - Our Mission: To empower businesses with beautiful, functional websites that drive growth and success in the digital world.
      - Our Values: We believe in quality craftsmanship, transparent communication, and building lasting relationships with our clients.
      - Our Promise: Every website we create is a testament to our commitment to excellence and attention to detail.
      -----------------------------------
      `;

const apiKey = 'AIzaSyDaXuS0o0kIZGcSS3cAYl-AX3rtcvcsaLQ';

// Retry Logic
async function fetchGeminiResponse(prompt) {
    const url = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-09-2025:generateContent?key=${apiKey}`;
    const maxRetries = 5;
    let attempt = 0;

    while (attempt <= maxRetries) {
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    contents: [{ parts: [{ text: prompt }] }],
                }),
            });

            if (!response.ok) {
                if (
                    response.status >= 400 &&
                    response.status < 500 &&
                    response.status !== 429
                ) {
                    throw new Error(
                        `API Error: ${response.status} ${response.statusText}. Please check your API key.`,
                    );
                }
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            return (
                data.candidates?.[0]?.content?.parts?.[0]?.text ||
                "I couldn't generate an answer based on the FAQ."
            );
        } catch (error) {
            console.error(`Attempt ${attempt + 1} failed:`, error);

            if (attempt === maxRetries) throw error;

            const delay = Math.pow(2, attempt) * 1000;
            await new Promise((resolve) => setTimeout(resolve, delay));
            attempt++;
        }
    }
}

askAiBtn.addEventListener('click', async () => {
    const userQuestion = aiQuestionInput.value.trim();
    if (!userQuestion) return;

    // UI Loading State
    aiLoader.classList.remove('hidden');
    btnText.textContent = 'Thinking...';
    askAiBtn.disabled = true;
    aiResponseContainer.classList.add('hidden');

    try {
        const aiText = await fetchGeminiResponse(
            contextText +
                `\nUser Question: ${userQuestion}\nAnswer (keep it short, friendly, and cite the specific owner if asked):`,
        );

        // Display Result
        aiResponseContainer.innerHTML = `<strong class="text-brand-primary">AI Answer:</strong> ${aiText}`;
        aiResponseContainer.classList.remove('hidden');
    } catch (error) {
        console.error(error);
        aiResponseContainer.innerHTML = `<span class="text-red-500">Sorry, I couldn't fetch an answer right now. Please try again or check the console for details.</span>`;
        aiResponseContainer.classList.remove('hidden');
    } finally {
        // Reset UI
        aiLoader.classList.add('hidden');
        btnText.textContent = 'Ask';
        askAiBtn.disabled = false;
    }
});
