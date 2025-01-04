use App\Models\UE;

public function test_creation_ue()
{
    $response = $this->post('/ues', [
        'code' => 'UE11',
        'nom' => 'Programmation Web',
        'credits_ects' => 6,
        'semestre' => 1,
    ]);

    $response->assertStatus(201);
    $this->assertDatabaseHas('unites_enseignement', ['code' => 'UE11']);
}
