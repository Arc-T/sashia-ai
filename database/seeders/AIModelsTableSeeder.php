<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AIModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            [
                'name' => 'GPT-4 Turbo',
                'vendor' => 'OpenAI',
                'model_identifier' => 'gpt-4-turbo-preview',
                'description' => 'OpenAI\'s most powerful model with 128K context window and knowledge up to April 2023',
                'version' => 'turbo-preview',
                'is_active' => true,
            ],
            [
                'name' => 'GPT-4',
                'vendor' => 'OpenAI',
                'model_identifier' => 'gpt-4',
                'description' => 'OpenAI\'s advanced multimodal model with strong reasoning capabilities',
                'version' => '4',
                'is_active' => true,
            ],
            [
                'name' => 'GPT-3.5 Turbo',
                'vendor' => 'OpenAI',
                'model_identifier' => 'gpt-3.5-turbo',
                'description' => 'Fast and cost-effective model for everyday tasks',
                'version' => '3.5-turbo',
                'is_active' => true,
            ],
            [
                'name' => 'Claude 3 Opus',
                'vendor' => 'Anthropic',
                'model_identifier' => 'claude-3-opus-20240229',
                'description' => 'Anthropic\'s most intelligent model for highly complex tasks',
                'version' => '20240229',
                'is_active' => true,
            ],
            [
                'name' => 'Claude 3 Sonnet',
                'vendor' => 'Anthropic',
                'model_identifier' => 'claude-3-sonnet-20240229',
                'description' => 'Anthropic\'s balanced model between intelligence and speed',
                'version' => '20240229',
                'is_active' => true,
            ],
            [
                'name' => 'Claude 3 Haiku',
                'vendor' => 'Anthropic',
                'model_identifier' => 'claude-3-haiku-20240307',
                'description' => 'Anthropic\'s fastest and most compact model for simple tasks',
                'version' => '20240307',
                'is_active' => true,
            ],
            [
                'name' => 'Gemini 1.0 Pro',
                'vendor' => 'Google',
                'model_identifier' => 'gemini-pro',
                'description' => 'Google\'s advanced multimodal model for general purposes',
                'version' => '1.0',
                'is_active' => true,
            ],
            [
                'name' => 'Gemini 1.5 Pro',
                'vendor' => 'Google',
                'model_identifier' => 'gemini-1.5-pro',
                'description' => 'Google\'s latest model with million-token context window',
                'version' => '1.5',
                'is_active' => true,
            ],
            [
                'name' => 'Llama 3',
                'vendor' => 'Meta',
                'model_identifier' => 'llama-3-70b',
                'description' => 'Meta\'s open-source large language model with 70B parameters',
                'version' => '3-70b',
                'is_active' => true,
            ],
            [
                'name' => 'Mixtral 8x7B',
                'vendor' => 'Mistral AI',
                'model_identifier' => 'mixtral-8x7b',
                'description' => 'High-quality sparse mixture of experts model with 8x7B parameters',
                'version' => '8x7b',
                'is_active' => true,
            ],
            [
                'name' => 'DALL-E 3',
                'vendor' => 'OpenAI',
                'model_identifier' => 'dall-e-3',
                'description' => 'OpenAI\'s most advanced image generation model',
                'version' => '3',
                'is_active' => true,
            ],
            [
                'name' => 'Stable Diffusion XL',
                'vendor' => 'Stability AI',
                'model_identifier' => 'stable-diffusion-xl',
                'description' => 'Open-source image generation model with high-quality outputs',
                'version' => 'XL',
                'is_active' => true,
            ],
            [
                'name' => 'Midjourney v6',
                'vendor' => 'Midjourney',
                'model_identifier' => 'midjourney-v6',
                'description' => 'Advanced AI image generation model with photorealistic capabilities',
                'version' => 'v6',
                'is_active' => true,
            ],
            [
                'name' => 'Whisper Large',
                'vendor' => 'OpenAI',
                'model_identifier' => 'whisper-large',
                'description' => 'OpenAI\'s speech recognition and translation model',
                'version' => 'large',
                'is_active' => true,
            ],
            [
                'name' => 'GPT-4 Vision',
                'vendor' => 'OpenAI',
                'model_identifier' => 'gpt-4-vision-preview',
                'description' => 'Multimodal model that can understand images and text',
                'version' => 'vision-preview',
                'is_active' => true,
            ],
            [
                'name' => 'Jurassic-2 Ultra',
                'vendor' => 'AI21 Labs',
                'model_identifier' => 'j2-ultra',
                'description' => 'AI21 Studio\'s most capable model for complex reasoning',
                'version' => '2-ultra',
                'is_active' => true,
            ],
            [
                'name' => 'Command R+',
                'vendor' => 'Cohere',
                'model_identifier' => 'command-r-plus',
                'description' => 'Cohere\'s advanced model for enterprise applications',
                'version' => 'r-plus',
                'is_active' => true,
            ],
            [
                'name' => 'Claude Instant',
                'vendor' => 'Anthropic',
                'model_identifier' => 'claude-instant-1.2',
                'description' => 'Anthropic\'s faster and more affordable model',
                'version' => '1.2',
                'is_active' => false,
            ],
            [
                'name' => 'GPT-3',
                'vendor' => 'OpenAI',
                'model_identifier' => 'gpt-3',
                'description' => 'Legacy OpenAI model (deprecated)',
                'version' => '3',
                'is_active' => false,
            ],
            [
                'name' => 'Codex',
                'vendor' => 'OpenAI',
                'model_identifier' => 'code-davinci-002',
                'description' => 'OpenAI\'s code generation model (deprecated)',
                'version' => 'davinci-002',
                'is_active' => false,
            ],
        ];

        DB::table('ai_models')->insert($models);
    }
}