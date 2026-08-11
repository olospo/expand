<style>
    :root {
        --green: #007f62;
        --bright-green: #b8f45b;
        --pale-green: #e7f1ec;
        --text: #173f35;
        --card: #f1f3f1;
        --white: #fff;
    }


    .stories {
        padding: 80px 0;
    }

    .stories__header h2 {
        margin: 0;
        color: var(--green);
        font-size: 22px;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .stories__grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
    }

    .story-card {
        position: relative;
        display: flex;
        flex-direction: column;
        width: 100%;
        padding: 0;
        border: 0;
        border-radius: 14px;
        background: var(--card);
        color: var(--text);
        text-align: left;
        cursor: pointer;
        overflow: hidden;
        font: inherit;
        transition:
            transform 180ms ease,
            box-shadow 180ms ease;
    }



    .story-card__image {
        aspect-ratio: 1.7 / 1;
        overflow: hidden;
        background: #dce5e0;
    }

    .story-card__image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .story-card__content {
        min-height: 155px;
        padding: 20px 22px 22px;
        transition: background 180ms ease, color 180ms ease;
    }

    .story-card__label {
        display: block;
        margin-bottom: 8px;
        color: #638077;
        font-size: 11px;
        line-height: 1.35;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .story-card__title {
        margin: 0 0 18px;
        font-size: 22px;
        line-height: 1.15;
    }

    .story-card__link {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 13px;
        border-radius: 999px;
        background: var(--bright-green);
        color: var(--text);
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .03em;
        text-transform: uppercase;
    }

    .story-card__arrow {
        font-size: 15px;
        line-height: 0;
    }

    /* Selected card */
    
    .story-card:hover .story-card__content {
        background: var(--green);
        color: var(--white);
        .story-card__title, .story-card__label {
          color: var(--white);
        }
    }
    .story-card.is-active .story-card__content {
        background: var(--green);
        color: var(--white);
        .story-card__title, .story-card__label {
          color: var(--white);
        }
    }


    .story-card.is-active .story-card__link {
        background: var(--bright-green);
    }

    /*
     * Desktop:
     * The detail panel is inserted into the grid after the row
     * containing the selected card.
     */
    .story-detail {
        grid-column: 1 / -1;
        position: relative;
        display: grid;
        grid-template-columns: minmax(180px, .75fr) minmax(0, 2fr);
        gap: 48px;
        margin: 0;
        padding: 48px 56px;
        border-radius: 14px;
        background: var(--pale-green);
        animation: detailIn 220ms ease;
        scroll-margin-top: 30px;
    }

    .story-detail::before {
        content: "";
        position: absolute;
        top: -10px;
        left: var(--detail-arrow-left, 16.66%);
        width: 20px;
        height: 20px;
        background: var(--pale-green);
        transform: rotate(45deg);
    }

    .story-detail__identity {
        position: relative;
        z-index: 1;
    }

    .story-detail__image {
        aspect-ratio: 1 / 1;
        width: 100%;
        max-width: 240px;
        overflow: hidden;
        border-radius: 10px;
        background: #dce5e0;
    }

    .story-detail__image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .story-detail__label {
        display: block;
        margin: 0 0 8px;
        color: #638077;
        font-size: 11px;
        line-height: 1.35;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .story-detail__title {
        margin: 0 0 28px;
        color: var(--green);
        font-size: 36px;
        line-height: 1.1;
    }

    .story-detail__content {
        max-width: 800px;
        font-size: 16px;
        line-height: 1.65;
    }

    .story-detail__content p {
        margin: 0 0 18px;
    }

    .story-detail__content p:last-child {
        margin-bottom: 0;
    }

    .story-detail__close {
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 2;
        display: grid;
        place-items: center;
        width: 34px;
        height: 34px;
        padding: 0;
        border: 0;
        border-radius: 50%;
        background: var(--bright-green);
        color: var(--text);
        font-size: 24px;
        line-height: 1;
        cursor: pointer;
    }

    .story-detail__close:hover {
        transform: scale(1.05);
    }

    .story-detail__close:focus-visible {
        outline: 3px solid var(--green);
        outline-offset: 2px;
    }

    @keyframes detailIn {
        from {
            opacity: 0;
            transform: translateY(-8px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    [hidden] {
        display: none !important;
    }

    @media (max-width: 800px) {
        .stories {
            padding: 56px 0;
        }

        .stories__grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .story-detail {
            grid-template-columns: 150px minmax(0, 1fr);
            gap: 28px;
            padding: 36px 32px;
        }

        .story-detail__title {
            font-size: 30px;
        }
    }

    @media (max-width: 540px) {
        .container {
            width: min(100% - 32px, 1200px);
        }

        .stories__grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        /*
         * On mobile the detail panel naturally sits directly
         * underneath the selected card because each card occupies
         * its own row.
         */
        .story-detail {
            display: block;
            padding: 32px 22px 28px;
        }

        .story-detail::before {
            left: 50%;
            transform: translateX(-50%) rotate(45deg);
        }

        .story-detail__identity {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        .story-detail__image {
            width: 90px;
            min-width: 90px;
        }

        .story-detail__title {
            margin-bottom: 8px;
            font-size: 28px;
        }

        .story-detail__content {
            font-size: 15px;
        }
    }
</style>

<section class="stories">
    <div class="container">

        <div class="stories__header">
            <h2>Employee Stories</h2>
        </div>

        <div class="stories__grid" id="stories-grid">

            <button class="story-card" type="button" data-story="aleyna" aria-expanded="false">
                <div class="story-card__image">
                    <img src="https://placehold.co/700x410/e0e9e4/007f62?text=Aleyna" alt="Aleyna Turkoglu">
                </div>
                <div class="story-card__content">
                    <span class="story-card__label">Analyst: Climate and Sustainability</span>
                    <h3 class="story-card__title">Aleyna Turkoglu</h3>
                    <span class="story-card__link">Read more <span class="story-card__arrow">→</span></span>
                </div>
            </button>

            <button class="story-card" type="button" data-story="wesley" aria-expanded="false">
                <div class="story-card__image">
                    <img src="https://placehold.co/700x410/e0e9e4/007f62?text=Wesley" alt="Wesley Chin">
                </div>
                <div class="story-card__content">
                    <span class="story-card__label">Analyst: Technology and Operations</span>
                    <h3 class="story-card__title">Wesley Chin</h3>
                    <span class="story-card__link">Read more <span class="story-card__arrow">→</span></span>
                </div>
            </button>

            <button class="story-card" type="button" data-story="coumba" aria-expanded="false">
                <div class="story-card__image">
                    <img src="https://placehold.co/700x410/e0e9e4/007f62?text=Coumba" alt="Coumba Camara">
                </div>
                <div class="story-card__content">
                    <span class="story-card__label">Project Leader</span>
                    <h3 class="story-card__title">Coumba Camara</h3>
                    <span class="story-card__link">Read more <span class="story-card__arrow">→</span></span>
                </div>
            </button>

            <button class="story-card" type="button" data-story="quinn" aria-expanded="false">
                <div class="story-card__image">
                    <img src="https://placehold.co/700x410/e0e9e4/007f62?text=Quinn" alt="Quinn Wijitprapai">
                </div>
                <div class="story-card__content">
                    <span class="story-card__label">Commercial Analyst: Climate and Sustainability</span>
                    <h3 class="story-card__title">Quinn Wijitprapai</h3>
                    <span class="story-card__link">Read more <span class="story-card__arrow">→</span></span>
                </div>
            </button>

            <button class="story-card" type="button" data-story="ewan" aria-expanded="false">
                <div class="story-card__image">
                    <img src="https://placehold.co/700x410/e0e9e4/007f62?text=Ewan" alt="Ewan Green">
                </div>
                <div class="story-card__content">
                    <span class="story-card__label">Associate</span>
                    <h3 class="story-card__title">Ewan Green</h3>
                    <span class="story-card__link">Read more <span class="story-card__arrow">→</span></span>
                </div>
            </button>

            <button class="story-card" type="button" data-story="tanishk" aria-expanded="false">
                <div class="story-card__image">
                    <img src="https://placehold.co/700x410/e0e9e4/007f62?text=Tanishk" alt="Tanishk Mittal">
                </div>
                <div class="story-card__content">
                    <span class="story-card__label">Project Leader</span>
                    <h3 class="story-card__title">Tanishk Mittal</h3>
                    <span class="story-card__link">Read more <span class="story-card__arrow">→</span></span>
                </div>
            </button>

        </div>

    </div>
</section>


<script>
const stories = {
    aleyna: {
        name: 'Aleyna Turkoglu',
        label: 'Analyst: Climate and Sustainability',
        image: 'https://placehold.co/500x500/e0e9e4/007f62?text=Aleyna',
        content: `
            <p>After completing my degree in chemical engineering at Koç University in Turkey, I moved to London to pursue a master's in management at Queen Mary University of London. During my studies, I joined BCG Expand as an intern on its ESG-focused EDCI team.</p>
            <p>I was already familiar with the company, and given my interest in ESG and sustainability within the financial services industry, the opportunity felt like a natural fit.</p>
            <p>Following my internship, I moved to the CCIB team, where I worked alongside BCG colleagues on client requests. I later rotated back to the EDCI team and, just one year after joining the company, took on responsibility for leading it.</p>
            <p>Along the way, I developed both my technical skills, particularly in Excel, and my managerial capabilities.</p>
            <p>The most challenging part of my role so far was the first time I was asked to lead the team independently. I took full responsibility for five graduates while also helping to shape our strategy. Balancing their individual questions and development needs while keeping everyone aligned pushed me to grow quickly as a leader.</p>
            <p>Looking back, what surprised me most was the level of responsibility and ownership I was given from the outset. Equally valuable has been the welcoming environment at Expand, from the consistent support of colleagues and regular social events to the opportunity to work with tier-one banking and financial-services clients.</p>
        `
    },
    wesley: {
        name: 'Wesley Chin',
        label: 'Analyst: Technology and Operations',
        image: 'https://placehold.co/500x500/e0e9e4/007f62?text=Wesley',
        content: `<p>Wesley's story goes here. This is placeholder content for the prototype.</p><p>The final version can be entered through the flexible content field in ACF.</p>`
    },
    coumba: {
        name: 'Coumba Camara',
        label: 'Project Leader',
        image: 'https://placehold.co/500x500/e0e9e4/007f62?text=Coumba',
        content: `<p>Coumba's story goes here. This is placeholder content for the prototype.</p>`
    },
    quinn: {
        name: 'Quinn Wijitprapai',
        label: 'Commercial Analyst: Climate and Sustainability',
        image: 'https://placehold.co/500x500/e0e9e4/007f62?text=Quinn',
        content: `<p>Quinn's story goes here. This is placeholder content for the prototype.</p>`
    },
    ewan: {
        name: 'Ewan Green',
        label: 'Associate',
        image: 'https://placehold.co/500x500/e0e9e4/007f62?text=Ewan',
        content: `<p>Ewan's story goes here. This is placeholder content for the prototype.</p>`
    },
    tanishk: {
        name: 'Tanishk Mittal',
        label: 'Project Leader',
        image: 'https://placehold.co/500x500/e0e9e4/007f62?text=Tanishk',
        content: `<p>Tanishk's story goes here. This is placeholder content for the prototype.</p>`
    }
};

const grid = document.querySelector('#stories-grid');
const cards = [...document.querySelectorAll('.story-card')];

function closeStory() {
    const detail = grid.querySelector('.story-detail');

    if (detail) {
        detail.remove();
    }

    cards.forEach(card => {
        card.classList.remove('is-active');
        card.setAttribute('aria-expanded', 'false');
    });
}

function openStory(card) {
    const id = card.dataset.story;

    // Clicking the currently open card closes it.
    if (card.classList.contains('is-active')) {
        closeStory();
        return;
    }

    closeStory();

    const story = stories[id];
    if (!story) return;

    card.classList.add('is-active');
    card.setAttribute('aria-expanded', 'true');

    const cardIndex = cards.indexOf(card);
    const columns = window.innerWidth <= 540 ? 1 : (window.innerWidth <= 800 ? 2 : 3);

    // Insert after the row containing the selected card.
    // At mobile (<=540px) there is one card per row, so the
    // detail panel is inserted immediately after the clicked card.
    const rowEndIndex = Math.min(
        Math.floor(cardIndex / columns) * columns + columns - 1,
        cards.length - 1
    );

    const rowEndCard = cards[rowEndIndex];

    const detail = document.createElement('article');
    detail.className = 'story-detail';
    detail.id = 'story-detail';
    detail.innerHTML = `
        <div class="story-detail__identity">
            <div class="story-detail__image">
                <img src="${story.image}" alt="${story.name}">
            </div>
        </div>

        <div class="story-detail__body">
            <span class="story-detail__label">${story.label}</span>
            <h3 class="story-detail__title">${story.name}</h3>
            <div class="story-detail__content">${story.content}</div>
        </div>

        <button class="story-detail__close" type="button" aria-label="Close story">×</button>
    `;

    rowEndCard.after(detail);

    // Position the small arrow underneath the selected card.
    const cardPosition = cardIndex % columns;
    const arrowPosition = ((cardPosition + 0.5) / columns) * 100;
    detail.style.setProperty('--detail-arrow-left', `${arrowPosition}%`);

    detail.querySelector('.story-detail__close').addEventListener('click', closeStory);

    // On mobile, move the panel into view; on desktop this also makes
    // the selected card/detail relationship obvious without over-scrolling.
    requestAnimationFrame(() => {
        detail.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest'
        });
    });
}

cards.forEach(card => {
    card.addEventListener('click', () => openStory(card));
});
</script>