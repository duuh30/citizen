<?php

namespace App\Console\Commands;

use App\Entities\Citizen;
use App\Http\Requests\CitizenRequest;
use App\Services\CitizenService;
use App\Services\ZipCodeService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CitizenCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'citizen:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Citizen';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param CitizenService $service
     * @param ZipCodeService $zipCodeService
     */
    public function handle(CitizenService $service, ZipCodeService $zipCodeService)
    {
        $data = [];

        $data['name']      = $this->ask('What is your name?');
        $data['surname']   = $this->ask('What is your surname?');
        $data['cpf']       = $this->ask('What is your cpf?');
        $data['phone']     = $this->ask('What is your phone number?');
        $data['cellphone'] = $this->ask('What is your cellphone number?');
        $data['email']     = $this->ask('What is your email?');
        $data['zip_code']  = $this->ask('What is your Zip Code?');

        if (!$this->validate($data)) {
            $responseAddress = $zipCodeService->find($data['zip_code']);

            Citizen::create(array_merge($data, $responseAddress));

            $this->info('Citizen successfully registered');

            if ($this->confirm('Do you want to see the citizen\'s saved data?')) {
                $headers = ['name', 'surname', 'cpf', 'phone', 'cellphone', 'email', 'zip_code', 'street', 'district', 'city', 'state'];

                $this->table($headers, [array_merge($data, $responseAddress)]);
            }
        }

    }

    /**
     * @param $data
     * @return mixed
     */
    public function validate($data)
    {
        $rules = [
            'name'      => 'required|min:3|max:255',
            'surname'   => 'required|min:3|max:255',
            'cpf'       => 'required|max:14|cpf|formato_cpf|unique:citizens',
            'phone'     => 'required|max:13|telefone_com_ddd',
            'cellphone' => 'required|max:14|celular_com_ddd',
            'email'     => 'required|max:255|email|unique:citizens',
            'zip_code'  => 'required|max:20|formato_cep',
        ];

        $validator = Validator::make($data, $rules, $this->messages());

        if ($validator->fails()) {
            $this->info('Citizen not created. See error messages');

            foreach($validator->errors()->all() as $error) {
                $this->warn($error);
            }

        }

        return $validator->fails();
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'cpf.formato_cpf'           => 'The cpf field is not in valid format',
            'cpf.cpf'                   => 'The cpf field is invalid',
            'phone.telefone_com_ddd'    => 'The phone field is not in valid ddd format',
            'cellphone.celular_com_ddd' => 'The cellphone field is not in valid ddd format',
            'zip_code.formato_cep'      => 'The zip_code field is not in valid format',
        ];
    }
}
