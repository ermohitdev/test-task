<?php

namespace App\Controller;

use App\Entity\Device;
use App\Repository\DeviceRepository;
use App\Requests\DeviceRequest;
use App\Traits\ApiResponser;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    private $doctrine;
    private $repository;
    use ApiResponser;
    
    #[Route('/api', name: 'app_api')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ApiController.php',
        ]);
    }

    public function __construct(ManagerRegistry $doctrine,DeviceRepository $repository)
    {
        $this->doctrine = $doctrine;
        $this->repository = $repository;
    }

    #[Route('/api/v1/add_device', name: 'add_device', methods: ['POST'])]
    public function create(DeviceRequest $request): Response
    {   
        try {
            $param = json_decode($request->getRequest()->getContent(), true);
            $device = new Device();
            $device->setName($param['name']);
            $device->setCategory($param['category'] ?? null);
            $device->setNumber($param['number']);
            $device->setDescription($param['description']);
            $em = $this->doctrine->getManager();
            $em->persist($device);
            $em->flush();

            return $this->successResponse(null,'Device Added Successfully',200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(),500);
        }
        
    }

    #[Route('/api/v1/update_device/{id}', name: 'update_device', methods: ['PUT'])]
    public function update(DeviceRequest $request, $id): Response
    {
        try {
            $device =  $this->repository->find($id);
            if ($device) {
                $param = json_decode($request->getRequest()->getContent(), true);
                $device->setName($param['name']);
                $device->setCategory($param['category'] ?? null);
                $device->setNumber($param['number']);
                $device->setDescription($param['description']);
                $em = $this->doctrine->getManager();
                $em->persist($device);
                $em->flush();
                 $res[] = [
                    'id' => $device->getId(),
                    'name' => $device->getName(),
                    'category' => $device->getCategory(),
                    'description' => $device->getDescription(),
                    'created_at' => $device->getCreatedAt()->format('Y-m-d H:i:s'),
                    'updated_at' => $device->getUpdatedAt()->format('Y-m-d H:i:s'),
                ];
                return $this->successResponse($res,'Device Updated Successfully',200);
            }

            return $this->errorResponse('Device not found',404);
        } catch (\Exception $e) {

            return $this->errorResponse($e->getMessage(),500);
        }
    }

    #[Route('/api/v1/delete_device/{id}', name: 'delete_device', methods: ['DELETE'])]
    public function delete($id): Response
    {
        try {
            $device =  $this->repository->find($id);
            if ($device) {
                $em = $this->doctrine->getManager();
                $em->remove($device);
                $em->flush();
                return $this->successResponse(null,'Device Deleted Successfully',200);
            }

            return $this->errorResponse('Device not found',404);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(),500);
        }
    }

    #[Route('/api/v1/device', name: 'list_device', methods: ['GET'])]
    public function list(): Response
    {   
        try {
            $res = [];
            $devices = $this->repository->findAll();
            foreach ($devices as $device) {
                $res[] = [
                    'id' => $device->getId(),
                    'name' => $device->getName(),
                    'category' => $device->getCategory(),
                    'description' => $device->getDescription(),
                    'created_at' => $device->getCreatedAt()->format('Y-m-d H:i:s'),
                    'updated_at' => $device->getUpdatedAt()->format('Y-m-d H:i:s'),
                ];
            }
            return $this->successResponse($res,'Device list',200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(),500);
        }
    }

    #[Route('/api/v1/get_device/{id}', name: 'get_device', methods: ['GET'])]
    public function showDevice($id): Response
    {
        $res = [];
        try {
            $device =  $this->repository->find($id);
            $res = [
                'id' => $device->getId(),
                'name' => $device->getName(),
                'category' => $device->getCategory(),
                'description' => $device->getDescription(),
                'created_at' => $device->getCreatedAt()->format('Y-m-d H:i:s'),
                'updated_at' => $device->getUpdatedAt()->format('Y-m-d H:i:s'),
            ];
            return $this->successResponse($res,'Device Info',200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(),500);
        }
    }
}
