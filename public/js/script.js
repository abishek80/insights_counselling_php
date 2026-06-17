// Service Data
const servicesData = {
    'depression': {
        title: 'Depression & Anxiety Counseling',
        icon: 'fa-heart-pulse',
        desc: 'At Insight Counseling Services, our experienced Chennai therapist and counseling psychologist provide compassionate mental health support for individuals struggling with anxiety, depression, emotional stress, panic attacks, fear, and overthinking. Emotional difficulties can affect sleep, relationships, confidence, work performance, and overall well-being. Our counseling sessions offer a safe, confidential, and supportive environment where individuals can openly express emotions and receive personalized therapy guidance tailored to their emotional needs.',
        helpWith: ['Anxiety & panic attacks', 'Depression & low mood', 'Emotional stress & burnout', 'Overthinking & fear', 'Sleep disturbances', 'Confidence building']
    },
    'stress': {
        title: 'Stress Management',
        icon: 'fa-brain',
        desc: 'Stress from work, academic pressure, relationships, parenting responsibilities, or personal struggles can affect emotional and physical well-being. At Insight Counseling Services, our counseling psychologist in Chennai provides professional mental health support to help individuals manage stress, emotional pressure, burnout, and anxiety effectively. Counseling sessions focus on identifying stress triggers, improving emotional awareness, and developing healthy coping strategies for better emotional balance and resilience.',
        helpWith: ['Work stress & burnout', 'Academic pressure', 'Emotional exhaustion', 'Overthinking & worry', 'Time management difficulties', 'Emotional balance & coping skills']
    },
    'anger': {
        title: 'Anger Management',
        icon: 'fa-fire-alt',
        desc: 'Difficulty controlling anger, frustration, or emotional reactions can negatively affect relationships, communication, work life, and emotional well-being. At Insight Counseling Services, our experienced Chennai therapist and counseling psychologist provide supportive anger management counseling to help individuals understand emotional triggers, improve emotional regulation, and communicate emotions in healthier ways.',
        helpWith: ['Anger outbursts', 'Emotional regulation', 'Communication issues', 'Relationship conflicts', 'Frustration management', 'Stress-related anger']
    },
    'grief': {
        title: 'Grief Counselling',
        icon: 'fa-cloud-showers-heavy',
        desc: 'Loss, heartbreak, separation, or emotional pain can deeply affect emotional well-being, relationships, motivation, and daily life. At Insight Counseling Services, our counseling psychologist and Chennai therapist provide compassionate grief counseling and mental health support to help individuals process difficult emotions and gradually move toward emotional healing and recovery.',
        helpWith: ['Loss of loved ones', 'Emotional pain & sadness', 'Breakups & separation', 'Loneliness & grief', 'Emotional healing', 'Coping with life changes']
    },
    'couple': {
        title: 'Couple Counselling',
        icon: 'fa-people-arrows',
        desc: 'Relationship misunderstandings, emotional distance, communication gaps, trust issues, and frequent conflicts can affect emotional well-being and family harmony. At Insight Counseling Services, our experienced counseling psychologist and Chennai therapist provide compassionate couple counseling in Chennai to help partners improve communication, rebuild trust, strengthen emotional connection, and develop healthier relationship patterns.',
        helpWith: ['Communication problems', 'Emotional distance', 'Trust issues', 'Frequent conflicts', 'Marriage support', 'Relationship healing']
    },
    'phobia': {
        title: 'Phobia Counselling',
        icon: 'fa-ghost',
        desc: 'Fear, anxiety, panic, or avoidance behaviors related to certain situations, places, people, or experiences can interfere with confidence, emotional well-being, and daily functioning. At Insight Counseling Services, our counseling psychologist in Chennai provides supportive phobia counseling and mental health support to help individuals understand fears, reduce anxiety responses, and gradually regain emotional confidence.',
        helpWith: ['Social anxiety', 'Fear & panic', 'Public speaking fear', 'Travel-related anxiety', 'Emotional stress', 'Confidence building']
    },
    'adolescent': {
        title: 'Adolescent Counselling',
        icon: 'fa-user-graduate',
        desc: 'Teenagers often face emotional struggles, academic stress, peer pressure, behavioral changes, low confidence, and difficulty managing emotions during important stages of growth and development. At Insight Counseling Services, our experienced counseling psychologist and Chennai therapist provide compassionate adolescent counseling in a safe and supportive environment.',
        helpWith: ['Academic stress', 'Peer pressure', 'Emotional struggles', 'Low self-esteem', 'Behavioral concerns', 'Parent-teen communication']
    },
    'relationship': {
        title: 'Relationship Counselling',
        icon: 'fa-hand-holding-heart',
        desc: 'Relationship conflicts, communication problems, trust issues, emotional misunderstandings, and unhealthy relationship patterns can affect emotional well-being and mental health. At Insight Counseling Services, our counseling psychologist in Chennai provides supportive relationship counseling to help individuals improve communication and emotional awareness.',
        helpWith: ['Relationship stress', 'Trust issues', 'Communication problems', 'Emotional conflicts', 'Healthy boundaries', 'Emotional awareness']
    },
    'bullying': {
        title: 'Bullying Issues',
        icon: 'fa-shield-heart',
        desc: 'Bullying can negatively affect confidence, emotional well-being, academic performance, relationships, and self-esteem in children, teenagers, and adults. At Insight Counseling Services, our experienced counseling psychologist and Chennai therapist provide compassionate mental health support to help individuals cope with bullying-related emotional struggles.',
        helpWith: ['Low confidence', 'Emotional trauma', 'Fear & anxiety', 'School bullying', 'Workplace bullying', 'Self-esteem support']
    }
};

// Team Data
const teamData = {
    'lekha': {
        name: 'Lekha Edwin',
        role: 'Founder / Psychologist',
        qual: 'M. Sc Counseling Psychology., M.A., B.Ed PG Diploma in Life Coaching and Counselling',
        langs: 'Tamil, English',
        specialties: ['Anxiety & Depression', 'Relationship Counseling', 'Teen Support', 'Personal Growth'],
        about: 'Lekha Edwin brings a thoughtful blend of academic training and hands-on counseling experience to her work as a Counseling Psychologist. With a strong foundation in psychology and continuous advanced training, she is committed to offering evidence-based, compassionate mental health support. Her clinical focus includes helping individuals manage anxiety, navigate depressive symptoms, and work through relationship and emotional challenges. Known for her empathetic and non-judgmental approach, Lekha creates a safe therapeutic space where clients feel heard, understood, and supported. Her work emphasizes practical coping strategies, emotional insight, and long-term wellbeing, making her a trusted support for individuals, couples, and adolescents seeking clarity, balance, and personal growth.',
        image: './assets/team/lekha-edwin.jpg'
    },
    'praveen': {
        name: 'Praveen',
        role: 'Psychologist',
        qual: 'BSc in Psychology, MSc in Clinical Psychology, PhD (Psychology) – Pursuing',
        langs: 'Tamil, English',
        specialties: ['Psychological Assessment', 'Psychotherapy', 'Behavioral Science', 'LGBTQIA+ Support'],
        about: 'Praveen is a dedicated psychologist with a strong foundation in clinical practice and mental health research. He holds a BSc in Psychology from PSG College, an MSc in Clinical Psychology from Christ (Deemed to be) University, Delhi, and is currently pursuing a PhD at Sri Ramachandra Institute of Higher Education and Research. With expertise in psychological assessment, psychotherapy, and behavioral science, he is committed to understanding human emotions, cognition, and well-being. His work focuses on conducting psychological assessments and providing evidence-based interventions to support mental health and enhance quality of life. Maintaining high ethical standards in practice, he works with vulnerable groups, including children, teenagers, adults, geriatrics, and the LGBTQIA+ community.',
        image: './assets/team/praveen.jpg'
    },
    'bala': {
        name: 'Bala Krishna M',
        role: 'Psychologist (Online Counselor)',
        qual: 'M.Sc. in Psychology, PG diploma in Life Skills and Counselling, Career Guidance',
        langs: 'English, Telugu, Tamil, Hindi',
        specialties: ['Depression & Anxiety', 'Stress Management', 'Couple/Marital Counselling', 'SFBT & NLP'],
        about: 'I am a counselling practitioner with specialization in Depression, Anxiety & Stress Management, Child & Adolescent Counselling and Couple/Marital/Premarital Counselling. He holds M.Sc. in Psychology from Singhania University. He also holds a PG diploma in Life Skills and Counselling, Career Guidance and Counselling with CBT from CCS Academy; and certifications in various areas of counselling from various institutions. He has counselled 600 plus clients, including few international clients. with expertise in techniques, such as Gestalt Therapy, CBT, RECBT, Transaction Analysis, SFBT and NLP. Krishna served as volunteer counselor to support Covid-19 Impacted families to recover from the tragic incidents as part of Banyan Academy of Leadership in Mental Health group in Tamil Nadu.',
        image: './assets/team/placeholder.png'
    },
    'banupriya': {
        name: 'Banupriya G Subash',
        role: 'Psychologist (Online Counselor)',
        qual: 'Master\'s in Psychology, Diploma in Clinical Hypnotherapy, Diploma in Counselling',
        langs: 'English, Tamil',
        specialties: ['Clinical Hypnotherapy', 'Phobia Treatment', 'Couple Conflicts', 'Life Skills Coaching'],
        about: 'I am a compassionate psychologist with a Master\'s in Psychology, a Diploma in Clinical Hypnotherapy, and a Diploma in Counselling and Psychotherapy. Her 2 years\' experience spans counselling children, adults, and the elderly, covering Issues like stress, anxiety, depression, child development, couple and family conflicts. She also specialize in hypnotherapy, using it for anxiety, phobias, trauma, habit control like bed wetting, temper tantrum, sibling rivalry and academic improvement, integrating it with other therapeutic methods for deeper behavioural change. Her practice incorporates evidence-based therapies such as CBT, RECBT, Gestalt therapy, PCT, SFBT and Transactional Analysis (Client Centred) creating safe, empathetic space.',
        image: './assets/team/banupriya.jpg'
    },
    'gayathri': {
        name: 'Gayathri Parthiban',
        role: 'Counseling Psychologist (Online Counselor)',
        qual: 'B.Sc. Nursing, M.Sc. Counselling Psychology, PG Diploma in Life Coaching',
        langs: 'English, Tamil, Malayalam',
        specialties: ['Student Counselling', 'Marital Counselling', 'Stress & Anxiety', 'Easy Integration Model'],
        about: 'I\'m a practicing Counselling Psychologist specialised in Student Counselling and marital counselling. She completed her B.Sc. Nursing in MGR University and M.Sc. Counselling psychology in university of madras. She also completed her pg diploma In life coaching and counselling in CCS academy. She is highly empathetic and professional in developing personalised models for the clients. She works great with young minds. She provides guidance to clients regarding stress, anxiety, depression by using Easy Integration Model',
        image: './assets/team/gayathri.jpg'
    },
    'kavya': {
        name: 'Kavya C',
        role: 'Psychologist (Online Counselor)',
        qual: 'M.Sc Psychology, Diploma in School & Family Counselling, Career Guidance',
        langs: 'English, Tamil, Telugu, Kannada',
        specialties: ['Career Guidance', 'Cognitive Behaviour Therapy', 'Corporate Counselling', 'Psychometric Testing'],
        about: 'With a solid educational foundation in Science and Psychology from Mysore University and the University of Madras, respectively, she refined her expertise through specialized training in Cognitive Behaviour Therapy under Dr. Ravi Samuel. Holding a Diploma in School, Corporate, and Family Counselling, along with certification as a Career Guidance Counsellor, and various other skill-developing certifications, she has been featured as a jury on Kalainagar TV\'s Vaazhndhu Kaatalam show. Gaining valuable experience as a Trainer at TISS in 2020, she has worked in roles such as a child Psychologist at First Cry, a student mentor at Buddy4study, a Trainer at Counsel India, and an EAP counsellor at Workplace Options. Proficient in conducting individual and group counselling, she has organized numerous webinars and seminars on diverse topics.',
        image: './assets/team/kavya.jpg'
    },
    'krishna': {
        name: 'Krishna Moorthy',
        role: 'Clinical Psychologist',
        qual: 'B.Sc. Psychology, MSc Psychology, M.Phil in Clinical Psychology',
        langs: 'English, Tamil, Telugu, Kannada, Malayalam',
        specialties: ['Psychopathology', 'Productivity Counseling', 'Psychometric Testing', 'Psychotherapy'],
        about: 'Krishna Moorthy is an accomplished clinical psychologist recognized for excellence in productivity counseling, receiving the Tamil Nadu Government Award for Best Productivity Counseling in 2014-2015. His expertise lies in adult and adolescent psychopathology, where he works extensively with various psychological conditions, providing psychometric testing and psychotherapy. Passionate about teaching, he actively shares his knowledge and experience to educate and inspire others in the field of psychology.',
        image: './assets/team/placeholder.png'
    }
};

// Handle Team Modal Population
const teamModal = document.getElementById('teamModal');
if (teamModal) {
    teamModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const teamId = button.getAttribute('data-team-id');
        const data = teamData[teamId];

        if (data) {
            document.getElementById('modal-name').innerText = data.name;
            document.getElementById('modal-role').innerText = data.role;
            document.getElementById('modal-qual').innerText = data.qual;
            document.getElementById('modal-langs').innerText = data.langs;
            document.getElementById('modal-about').innerText = data.about;
            
            const imgCol = document.querySelector('.profile-img-col');
            if (imgCol) {
                imgCol.style.backgroundImage = `url('${data.image}')`;
            }

            const specialtiesCont = document.getElementById('modal-specialties');
            if (specialtiesCont) {
                specialtiesCont.innerHTML = '';
                data.specialties.forEach(spec => {
                    const span = document.createElement('span');
                    span.className = 'specialty-tag';
                    span.textContent = spec;
                    specialtiesCont.appendChild(span);
                });
            }
        }
    });
}

// Handle Service Modal Population
const serviceModal = document.getElementById('serviceModal');
if (serviceModal) {
    serviceModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const serviceId = button.getAttribute('data-service-id');
        const data = servicesData[serviceId];

        if (data) {
            document.getElementById('modal-service-title').innerText = data.title;
            document.getElementById('modal-service-desc').innerText = data.desc;
            
            const iconElement = document.getElementById('modal-service-icon');
            if (iconElement) iconElement.className = 'fas ' + data.icon;

            const listElement = document.querySelector('.service-benefit-list');
            if (listElement) {
                listElement.innerHTML = '';
                data.helpWith.forEach(item => {
                    const li = document.createElement('li');
                    li.innerHTML = `<i class="fas fa-check-circle"></i> ${item}`;
                    listElement.appendChild(li);
                });
            }
        }
    });
}

// Global Logic (Sticky Navbar)
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
});

// Initialize Swiper (Testimonials)
const swiper = new Swiper('.testimonialSwiper', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});
