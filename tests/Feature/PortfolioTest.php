<?php

namespace Tests\Feature;

use App\Livewire\AwardsShowcase;
use Livewire\Livewire;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    public function test_nasa_tall_draft_renders_hardened_and_lean_content(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('theme-nasa');
        $response->assertSee('Chutikhan Chomklang');
        $response->assertSee('B.Eng. Computer Engineering');
        $response->assertSee('Suranaree University of Technology');
        $response->assertSee('/resume/chutikhan-chomklang-resume.pdf');
        $response->assertSee('IMG-HERO-01');
        $response->assertSee('IMG-CAP-01');
        $response->assertSee('IMG-AWD-01');
        $response->assertSee('Problem:');
        $response->assertSee('Lever:');
        $response->assertSee('Outcome:');
        $response->assertSee('Show all 10 initiatives (+6)');
        $response->assertSee('Final Internship — Organization (TBD)');
        $response->assertSee('wire:id=', false);

        for ($i = 1; $i <= 5; $i++) {
            $response->assertSee(sprintf('IMG-EXP-%02d', $i));
        }

        for ($i = 1; $i <= 10; $i++) {
            $response->assertSee(sprintf('IMG-LEAD-%02d', $i));
        }

        $response->assertDontSee('config/portfolio.php');
        $response->assertDontSee('APPLE ARCHIVE');
        $response->assertDontSee('Revenue &amp; Cost Impact', false);
        $response->assertDontSee('bg-signal/20');
        $response->assertDontSee('IMG-CASE-01');
    }

    public function test_resume_pdf_exists_and_is_valid_pdf_header(): void
    {
        $pdfPath = public_path('resume/chutikhan-chomklang-resume.pdf');
        $this->assertFileExists($pdfPath);
        $this->assertStringStartsWith('%PDF-', (string) file_get_contents($pdfPath));
    }

    public function test_nasa_alias_redirects_permanently_to_root(): void
    {
        $this->get('/nasa')->assertRedirect('/');
    }

    public function test_image_slots_render_real_img_when_src_is_populated(): void
    {
        config([
            'portfolio.hero.image.src' => '/images/portrait.jpg',
            'portfolio.experience.items.0.image.src' => '/images/exp.jpg',
            'portfolio.cases.items.0.image.src' => '/images/case.jpg',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('src="/images/portrait.jpg"', false);
        $response->assertSee('src="/images/exp.jpg"', false);
        $response->assertSee('src="/images/case.jpg"', false);
        $response->assertDontSee('IMG-HERO-01');
    }

    public function test_livewire_awards_showcase_reads_config_without_serializing_slides(): void
    {
        $component = Livewire::test(AwardsShowcase::class)
            ->assertSee('ENGi Research to Market (R2M)')
            ->assertSee('IMG-AWD-01')
            ->assertSee('01 / 02')
            ->call('next')
            ->assertSee('C2C TechX Business Innovation')
            ->assertSee('IMG-AWD-02')
            ->assertSee('02 / 02')
            ->call('next')
            ->assertSee('ENGi Research to Market (R2M)')
            ->assertSee('01 / 02')
            ->call('prev')
            ->assertSee('C2C TechX Business Innovation')
            ->assertSee('02 / 02');

        $this->assertArrayNotHasKey('slides', $component->snapshot['data']);
    }

    public function test_livewire_awards_showcase_handles_empty_slides_safely(): void
    {
        config(['portfolio.awards.slides' => []]);

        Livewire::test(AwardsShowcase::class)
            ->assertSet('active', 0)
            ->call('next')
            ->assertSet('active', 0)
            ->call('prev')
            ->assertSet('active', 0)
            ->call('select', 2)
            ->assertSet('active', 0);
    }

    public function test_apple_archived_draft_renders_in_testing_environment(): void
    {
        $response = $this->get('/apple');

        $response->assertStatus(200);
        $response->assertSee('theme-apple');
        $response->assertSee('IMG-HERO-01');
        $response->assertSee('IMG-EXP-01');
        $response->assertSee('IMG-CASE-01');
        $response->assertSee('IMG-AWD-01');
        $response->assertSee('IMG-LEAD-01');
        $response->assertSee('/nasa');
    }

    public function test_portfolio_config_fallbacks_remain_non_empty_and_apple_flag_is_bool(): void
    {
        $this->assertNotEmpty(config('portfolio.meta.email'));
        $this->assertNotEmpty(config('portfolio.meta.linkedin'));
        $this->assertNotEmpty(config('portfolio.meta.resume_url'));
        $this->assertNotEmpty(config('portfolio.hero.primary_cta.href'));
        $this->assertIsBool(config('portfolio.enable_apple_draft'));
    }
}
