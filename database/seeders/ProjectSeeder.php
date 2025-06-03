<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    private $data = [
        [
            "title" => "Secure Network Protocols",
            "description" => "<p>Develop and implement <i>secure network protocols </i>for data communication. Emphasis on encryption, authentication, and efficient data transfer. Knowledge of cryptography is essential.</p><p><strong>Prerequisites:</strong> Networking and cryptography fundamentals.</p><p><i>Duration:</i> 4 months</p>"
        ],
        [
            "title" => "High-Performance Computing",
            "description" => "<p>This project involves optimizing code for high-performance computing environments. Topics include parallel programming, GPU acceleration, and optimizing algorithms for speed.</p><p><strong>Skills:</strong> Parallel programming, CUDA, OpenMP.</p><p><i>Duration:</i> 6 months</p>"
        ],
        [
            "title" => "Machine Learning Infrastructure",
            "description" => "<p>Build a robust machine learning infrastructure capable of handling large datasets. Focus on scalability, model deployment, and efficient data processing.</p><p><strong>Requirements:</strong> Proficiency in machine learning and distributed systems.</p><p><i>Duration:</i> 5 months</p>"
        ],
        [
            "title" => "Web Application Security",
            "description" => "<p>Explore and implement strategies for securing web applications. Topics include input validation, session management, and protection against common security vulnerabilities.</p><p><strong>Prerequisites:</strong> Understanding of web development and security principles.</p><p><i>Duration:</i> 3 months</p>"
        ],
        [
            "title" => "Blockchain Development",
            "description" => "<p>Develop decentralized applications (DApps) using blockchain technology. Learn about smart contracts, consensus algorithms, and build applications on popular blockchain platforms.</p><p><strong>Skills:</strong> Solid understanding of blockchain concepts and programming skills.</p><p><i>Duration:</i> 4 months</p>"
        ],
        [
            "title" => "Data Science for Finance",
            "description" => "<p>Apply data science techniques to analyze financial data. Explore predictive modeling, risk assessment, and data-driven decision-making in the context of finance.</p><p><strong>Requirements:</strong> Basic knowledge of finance and data analysis.</p><p><i>Duration:</i> 6 months</p>"
        ],
        [
            "title" => "Cloud Native Application Development",
            "description" => "<p>Design and build cloud-native applications using microservices architecture. Explore containerization, orchestration, and cloud-native development best practices.</p><p><strong>Skills:</strong> Familiarity with cloud platforms and microservices.</p><p><i>Duration:</i> 5 months</p>"
        ],
        [
            "title" => "Cybersecurity Incident Response",
            "description" => "<p>Develop and implement a robust incident response plan for cybersecurity incidents. Learn about identifying, containing, and mitigating security breaches.</p><p><strong>Prerequisites:</strong> Knowledge of cybersecurity fundamentals.</p><p><i>Duration:</i> 4 months</p>"
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->data as $item) {
            Project::create($item);
        }
    }
}
