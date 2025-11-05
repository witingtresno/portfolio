<?php

namespace App\ViewModels;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeViewModel
{
    public function __construct(
        protected ?Profile $profile,
        protected Collection $projects,
        protected Collection $skills,
    ) {
    }

    public static function make(): self
    {
        return new self(
            Profile::query()->first(),
            Project::query()
                ->orderBy('display_order')
                ->orderByDesc('created_at')
                ->get(),
            Skill::query()
                ->orderBy('display_order')
                ->orderBy('name')
                ->get()
        );
    }

    public function profile(): array
    {
        if (! $this->profile) {
            return [];
        }

        $avatar = $this->profile->image ? Storage::url($this->profile->image) : null;

        return [
            'name' => $this->profile->name,
            'job' => $this->profile->job,
            'bio' => $this->profile->bio,
            'about_paragraphs' => $this->formatParagraphs($this->profile->about_me)->all(),
            'avatar' => $avatar,
            'primary_contact' => $this->normalizeUrl($this->profile->contact) ?? ($this->profile->email ? 'mailto:' . $this->profile->email : null),
            'resume_link' => $this->normalizeUrl($this->profile->resume_link),
            'social_links' => $this->buildSocialLinks(),
        ];
    }

    public function projects(): Collection
    {
        return $this->projects
            ->map(function (Project $project) {
                $images = Collection::make($project->images ?? [])
                    ->filter()
                    ->map(fn (string $path) => Storage::url($path))
                    ->values();

                return [
                    'title' => $project->title,
                    'subtitle' => $project->subtitle,
                    'description' => $project->description,
                    'link' => $this->normalizeUrl($project->link),
                    'images' => $images,
                    'primary_image' => $images->first(),
                ];
            });
    }

    public function skills(): Collection
    {
        return $this->skills->map(fn (Skill $skill) => [
            'name' => $skill->name,
            'initials' => Str::of($skill->name)->replaceMatches('/[^A-Za-z0-9]/', '')->substr(0, 2)->upper()->toString(),
            'category' => $skill->category,
            'level' => $skill->level,
            'icon' => $this->resolveIcon($skill->icon),
        ]);
    }

    protected function buildSocialLinks(): Collection
    {
        return Collection::make([
            [
                'label' => 'Email',
                'url' => $this->profile?->email ? 'mailto:' . $this->profile->email : null,
                'display' => $this->profile?->email,
            ],
            [
                'label' => 'Facebook',
                'url' => $this->normalizeUrl($this->profile?->facebook),
            ],
            [
                'label' => 'Instagram',
                'url' => $this->normalizeUrl($this->profile?->instagram),
            ],
            [
                'label' => 'LinkedIn',
                'url' => $this->normalizeUrl($this->profile?->linkedin),
            ],
            [
                'label' => 'GitHub',
                'url' => $this->normalizeUrl($this->profile?->github),
            ],
        ])
            ->filter(fn (array $link) => filled($link['url'] ?? null))
            ->values();
    }

    protected function normalizeUrl(?string $value): ?string
    {
        if (blank($value)) {
            return null;
        }

        if (Str::startsWith($value, ['http://', 'https://', 'mailto:', 'tel:', 'whatsapp://'])) {
            return $value;
        }

        if (Str::startsWith($value, 'wa.me')) {
            return 'https://' . ltrim($value, '/');
        }

        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return 'mailto:' . $value;
        }

        return 'https://' . ltrim($value, '/');
    }

    protected function formatParagraphs(?string $text): Collection
    {
        if (blank($text)) {
            return collect();
        }

        $normalized = str_replace(["\r\n", "\r"], "\n", trim($text));

        return Collection::make(preg_split("/\n{2,}/", $normalized))
            ->map(fn (?string $paragraph) => $paragraph ? preg_replace("/\n+/", ' ', trim($paragraph)) : null)
            ->filter()
            ->values();
    }

    protected function resolveIcon(?string $icon): ?string
    {
        if (blank($icon)) {
            return null;
        }

        if (Str::startsWith($icon, ['http://', 'https://', 'data:'])) {
            return $icon;
        }

        if (Str::startsWith($icon, ['storage/', 'images/', 'icons/', 'assets/'])) {
            return asset($icon);
        }

        return asset(trim($icon, '/'));
    }
}
