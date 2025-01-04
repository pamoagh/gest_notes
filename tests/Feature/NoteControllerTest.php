use App\Models\Note;

public function test_ajout_note()
{
    $response = $this->post('/notes', [
        'etudiant_id' => 1,
        'ec_id' => 1,
        'note' => 15,
        'session' => 'normale',
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('notes', ['note' => 15]);
}
