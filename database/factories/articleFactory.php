<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\article>
 */
class articleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence();
        $content = fake()->paragraphs(asText:true);
        $created_at = fake()->dateTimeBetween('-1 year');

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => str::limit($content, 150),
            'content' => $content,
            'status' => fake()->randomElement(['Refus', 'En cours', 'Retenu', 'Publié']),
            'image' => fake()->randomElement(['https://picsum.photos/1050/300']),
            'created_at' => $created_at,
            'updated_at' => $created_at,

        ];
    }
}


$articles = collect([
            [
                'title' => 'L\'impact de l\'IA générative sur la cybersécurité : opportunités et risques',
                'content' => 'Les modèles d\'IA comme GPT-4 révolutionnent la détection des menaces mais facilitent aussi la création de malware sophistiqués. Une course technologique entre hackers et défenseurs se joue actuellement.

        **Nouveau contenu** :
        En 2023, une attaque utilisant ChatGPT a généré 15 000 variantes de phishing personnalisées en 24h. Paradoxalement, Darktrace a développé CyberAI Analyst capable d\'analyser 200M événements/jour avec 99,8% de précision.

        **Statistiques** :
        - 73% des SOCs utilisent désormais des outils IA (SANS Institute)
        - Coût moyen d\'une violation de données réduit de 40% avec l\'IA (IBM Security)'
            ],
            [
                'title' => 'Blockchain et décentralisation : vers une nouvelle ère de confiance numérique',
                'content' => 'Les smart contracts et DAO redéfinissent les interactions économiques. Cependant, les vulnérabilités des protocoles DeFi montrent les limites de cette utopie décentralisée.

        **Nouveau contenu** :
        Le protocole MakerDAO a automatisé 85% de ses décisions financières via des votes tokenisés. Cependant, l\'exploit du bridge Wormhole (320M$ volés) révèle les risques des interconnexions cross-chain.

        **Innovations** :
        - zk-SNARKs réduisent la taille des preuves blockchain de 98%
        - Les CBDC (monnaies digitales de banque centrale) adoptent des hybrides blockchain privée/public'
            ],
            [
                'title' => 'Optimisation des architectures cloud avec le serverless computing',
                'content' => 'AWS Lambda et Azure Functions réduisent les coûts d\'infrastructure de 40% selon une étude récente, mais nécessitent une refonte des pratiques de monitoring.

        **Nouveau contenu** :
        Spotify a migré 150 microservices vers AWS Lambda, réduisant ses coûts de 6M$/an. Les architectures event-driven avec Kafka permettent maintenant des temps de réponse <100ms.

        **Outils** :
        - Datadog Serverless Monitoring (analyse des cold starts)
        - AWS X-Ray pour le tracing distribué
        - Capacité de burst jusqu\'à 3000 instances simultanées'
            ],
            [
                'title' => 'Les défis de la protection des données dans l’Internet des Objets (IoT)',
                'content' => 'Avec 35 milliards d\'appareils connectés en 2023, le chiffrement de bout en bout devient critique, surtout pour les dispositifs médicaux connectés.

        **Nouveau contenu** :
        Le pacemaker connecté Medtronic a subi 23 vulnérabilités critiques en 2022. Les nouveaux standards NIST.IR 8259 imposent maintenant une authentification biométrique pour les dispositifs médicaux.

        **Solutions** :
        - Protocole Matter pour l\'interopérabilité sécurisée
        - Chiffrement post-quantique sur les puces LoRaWAN
        - 85% des attaques IoT visent des caméras non patchées'
            ],
            [
                'title' => 'Méthodes agiles vs DevOps : complémentarité ou concurrence ?',
                'content' => 'Le DevOps étend l\'agilité au déploiement continu, mais crée des frictions dans les organisations hiérarchiques traditionnelles. Étude de cas chez Renault.

        **Nouveau contenu** :
        Renault a réduit son time-to-market de 60% en combinant SAFe (Scaled Agile Framework) et GitLab CI/CD. Les équipes frontend atteignent maintenant 30 déploiements/jour.

        **Indicateurs clés** :
        - MTTR (temps de réparation moyen) réduit de 75%
        - 94% des organisations DevOps utilisent Kubernetes (CNCF 2023)
        - ROI moyen du DevOps : 5,2$ par dollar investi'
            ],
            [
                'title' => 'L\'informatique quantique : rupture technologique ou fantasme scientifique ?',
                'content' => 'IBM Q System One atteint 433 qubits, mais le "quantum supremacy" reste inaccessible pour les applications commerciales avant 2030 selon McKinsey.

        **Nouveau contenu** :
        Google a simulé une molécule d\'azote avec 54 qubits, accélérant la découverte d\'engrais par 1000x. Mais les erreurs de cohérence limitent encore les applications pratiques.

        **Applications concrètes** :
        - Optimisation du trafic aérien (Lockheed Martin)
        - Cryptanalyse post-quantique (NIST Standardization Process)
        - Modélisation climatique avec 1km de résolution'
            ],
            [
                'title' => 'Analyse comparative des frameworks de deep learning : TensorFlow vs PyTorch',
                'content' => 'PyTorch domine la recherche (75% des publications arXiv) tandis que TensorFlow reste leader en production industrielle, selon le benchmark MLPerf 2023.

        **Nouveau contenu** :
        TensorFlow Serving permet de déployer des modèles sur 10 000+ nœuds avec <5ms de latence. PyTorch Lightning a réduit le code boilerplate de 80% pour les chercheurs.

        **Performances** :
        - Entraînement ResNet-50 : TF 2.11 = 32s/epoch vs PT 2.0 = 28s/epoch
        - Support TPU natif uniquement dans TensorFlow
        - 92% des startups Y Combinator utilisent PyTorch'
            ],
            [
                'title' => 'Cybersécurité : comment lutter contre les attaques zero-day en temps réel ?',
                'content' => 'Les solutions BAS (Breach and Attack Simulation) combinées au Threat Intelligence réduisent de 60% le temps de réponse selon un rapport de Palo Alto Networks.

        **Nouveau contenu** :
        Le framework MITRE ATT&CK recense maintenant 400+ TTPs (Tactics, Techniques, Procedures). Les solutions comme CrowdStrike Falcon utilisent l\'IA pour prédire les attaques avec 94% de précision.

        **Cas réel** :
        L\'attaque SolarWinds a exploité 5 zero-days simultanés pendant 18 mois. Les nouveaux EDR (Endpoint Detection and Response) détectent maintenant 99,7% des malwares in-memory.'
            ],
            [
                'title' => 'L\'éthique de l\'IA : régulation des biais algorithmiques dans les systèmes décisionnels',
                'content' => 'Le règlement EU AI Act impose dès 2025 des audits obligatoires pour les systèmes critiques comme le recrutement ou la justice prédictive.

        **Nouveau contenu** :
        Amazon a dû abandonner son outil de recrutement IA qui pénalisait les CV féminins. Les nouveaux algorithmes comme IBM Fairness 360 corrigent les biais avec 98% d\'efficacité.

        **Métriques** :
        - Disparité statistique < 5% exigée pour les systèmes à haut risque
        - 70% des modèles NLP montrent des biais ethniques (Stanford Study)
        - Amendes jusqu\'à 6% du chiffre d\'affaires global pour non-conformité'
            ],
            [
                'title' => 'Réseaux neuronaux convolutifs et diagnostic médical automatisé',
                'content' => 'L\'analyse d\'IRM par CNN atteint 98% de précision pour détecter les tumeurs cérébrales, mais soulève des questions juridiques sur la responsabilité médicale.

        **Nouveau contenu** :
        La FDA a approuvé 12 dispositifs médicaux IA en 2023, dont IDx-DR pour la rétinopathie diabétique. Cependant, un faux négatif sur 10 000 cas reste inacceptable en oncologie.

        **Enjeux** :
        - Biais ethniques dans les datasets d\'entraînement (90% caucasiens)
        - GDPR impose le droit à l\'explication algorithmique
        - Coût moyen d\'un système de diagnostic IA : 2,5M$ à développer'
            ],
            [
                'title' => 'La 5G et son rôle dans l\'évolution de l\'edge computing',
                'content' => 'La latence de 1 ms permet de déployer des usines autonomes, avec des cas concrets chez Siemens et Schneider Electric.

        **Nouveau contenu** :
        Les réseaux 5G privés atteignent 20 Gbit/s en uplink pour la réalité augmentée industrielle. Ericsson a déployé 1500 mini-data centers en edge pour la téléchirurgie.

        **Statistiques** :
        - 80% des données industrielles seront traitées en edge d\'ici 2025 (Gartner)
        - Réduction de 90% de la bande passante cloud grâce au preprocessing edge
        - 500 000 antennes 5G déployées en UE fin 2023'
            ],
            [
                'title' => 'Vers une standardisation des langages de programmation low-code',
                'content' => 'Microsoft Power Fx et OutSystems mènent la bataille, mais l\'interopérabilité entre plateformes reste le principal frein à l\'adoption massive.

        **Nouveau contenu** :
        Le projet OASIS Open Project vise à créer un standard open source pour le low-code. 45% des applications d\'entreprise utilisent maintenant des composants low-code.

        **Limitations** :
        - Complexité algorithmique limitée (max 10 000 lignes générées)
        - 78% des développeurs professionnels rejettent le low-code pour le core business
        - Coût moyen par utilisateur low-code : 120$/mois'
            ],
            [
                'title' => 'Gestion des données massives : le rôle des entrepôts de données modernes',
                'content' => 'Snowflake et Databricks révolutionnent l\'analyse en temps réel, avec des gains de performance atteignant 100x sur les requêtes PB-scale.

        **Nouveau contenu** :
        Uber traite maintenant 25 Po de données/jour avec Delta Lake sur Databricks. Les entrepôts serverless réduisent les coûts de 70% grâce à l\'autoscaling.

        **Fonctionnalités clés** :
        - Time Travel : accès aux données historiques sur 90 jours
        - Zero-copy cloning pour le test de pipelines
        - Support natif du machine learning avec MLflow'
            ],
            [
                'title' => 'Les limites de la reconnaissance faciale dans un contexte réglementaire strict',
                'content' => 'Le RGPD impose depuis 2022 un consentement explicite, réduisant de 70% les déploiements en UE selon un rapport de l\'ANSSI.

        **Nouveau contenu** :
        San Francisco et Boston ont interdit la reconnaissance faciale publique. Les alternatives comme la reconnaissance comportementale (posture, démarche) émergent avec 85% de précision.

        **Controverses** :
        - Biais racial : erreurs de 34% sur les peaux sombres (MIT Study)
        - DeepPrivacy algorithm masque automatiquement les visages dans les vidéos
        - 92% des citoyens UE refusent la reconnaissance faciale dans les espaces publics'
            ],
            [
                'title' => 'Réalité augmentée et formation professionnelle : études de cas dans l’industrie',
                'content' => 'Chez Airbus, les techniciens gagnent 35% de temps sur les procédures de maintenance grâce aux lunettes HoloLens 2.

        **Nouveau contenu** :
        Boeing utilise la RA pour superposer les schémas de câblage sur les avions (précision de 0,2mm). La formation aux risques chimiques avec RA réduit les accidents de 60%.

        **Technologies** :
        - Varjo XR-3 : résolution 70 PPD (équivalent œil humain)
        - SDK ARKit 5 d\'Apple : suivi des mains et environnement 3D
        - Coût moyen d\'un casque industriel RA : 2 500$'
            ],
            [
                'title' => 'Cryptomonnaies et enjeux énergétiques : quelle transition écologique possible ?',
                'content' => 'Le passage au Proof-of-Stake réduit la consommation d\'Ethereum de 99.95%, mais le Bitcoin reste dépendant des énergies fossiles à 65%.

        **Nouveau contenu** :
        Le Bitcoin Mining Council rapporte que 58% de l\'énergie minière est renouvelable. Les fermes minières en Islande utilisent la géothermie pour un hashrate neutre en CO2.

        **Alternatives** :
        - Chia Network (proof-of-space-time) : 0,16% de la consommation Bitcoin
        - Algorand : blockchain carbone négatif via partenariats climatiques
        - Taxe carbone de 30% proposée sur le minage dans l\'UE'
            ],
            [
                'title' => 'Automatisation des tests logiciels via l\'intelligence artificielle',
                'content' => 'Les outils comme Testim.io utilisent le ML pour générer des cas de test, couvrant 80% des scénarios critiques en 2x moins de temps.

        **Nouveau contenu** :
        GitHub Copilot suggère maintenant des tests unitaires avec 92% de précision. Les tests visuels AI détectent les anomalies UI/UX avec une précision pixel près.

        **Métriques** :
        - Réduction de 85% des régressions en production
        - 1 test AI = 50 tests manuels en couverture de code
        - Coût moyen réduit de 40% par cycle de test'
            ],
            [
                'title' => 'La confidentialité différentielle : une solution pour l\'anonymisation des données ?',
                'content' => 'Apple l\'utilise dans iOS 16 pour collecter des métriques utilisateur sans compromettre la vie privée, avec un epsilon de 0.5 pour équilibrer précision/anonymat.

        **Nouveau contenu** :
        Le US Census 2020 a appliqué la confidentialité différentielle, introduisant une erreur de ±3,2% sur les données démographiques. Les algorithmes comme PrivBayes génèrent des datasets synthétiques exploitables.

        **Outils** :
        - Google Differential Privacy Library (open source)
        - ε=1 : équilibre optimal entre utilité et vie privée
        - 78% des données santé peuvent être partagées avec cette méthode'
            ],
            [
                'title' => 'L\'essor des GPT-4 dans la génération de contenu : révolution ou menace ?',
                'content' => '30% des articles Wikipedia sont désormais générés par IA, nécessitant des garde-fous contre la désinformation algorithmique.

        **Nouveau contenu** :
        Le New York Times utilise GPT-4 pour 40% de ses résumés d\'articles, mais a dû embaucher 15 éditeurs spécialisés en vérification IA. Les watermarking algorithms détectent maintenant 99% des textes générés.

        **Risques** :
        - 45% des étudiants utilisent ChatGPT pour les devoirs (étude Stanford)
        - DALL-E 3 génère 10 000 images/jour pour des campagnes marketing
        - Loi européenne en préparation sur l\'étiquetage obligatoire du contenu IA'
            ],
            [
                'title' => 'Les microservices en pratique : avantages et pièges à éviter',
                'content' => 'Le pattern Saga devient indispensable pour gérer les transactions distribuées, comme le montre l\'architecture de PayPal traitant 10M req/min.

        **Nouveau contenu** :
        Netflix utilise 700+ microservices avec un SLA de 99,999%. Cependant, l\'incident de décembre 2022 (24h d\'indisponibilité) provenait d\'une défaillance en chaîne dans 12 services interdépendants.

        **Best Practices** :
        - Service Mesh (Istio/Linkerd) pour l\'observabilité
        - Circuit Breaker pattern avec Hystrix
        - Tests de chaos via Gremlin
        - Coût moyen d\'un microservice : 50 000$/an à maintenir'
            ]
]);
